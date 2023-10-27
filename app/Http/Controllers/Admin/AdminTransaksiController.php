<?php

namespace App\Http\Controllers\Admin;

use App\Models\ListOrder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listorders = ListOrder::orderBy('jumlah_order', 'desc')->get();
        return view('admin.transaksi.index', compact('listorders'));
    }

    public function indexLaporan()
    {
        $laporans = ListOrder::where('status_order', 'Selesai')
        ->orderBy('jumlah_order', 'desc')
        ->get();
        return view('admin.pembukuan.laporan', compact('laporans'));
    }

    public function indexChart()
    {
        $orders = DB::table('list_order')
                    ->select(DB::raw("MONTH(jumlah_order) as month"), 'jenis_transaksi', DB::raw('SUM(harga_order) as total'))
                    ->where('status_order', 'Selesai')
                    ->groupBy('month', 'jenis_transaksi')
                    ->orderBy('month', 'asc')
                    ->get();

        $data = [];

        foreach ($orders as $order) {
            $data[$order->month][$order->jenis_transaksi] = $order->total;
        }
        
    return view('admin.pembukuan.index', compact('data'));
    
    }

    public function create()
    {
        return view('admin.transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'user_order' => 'required',
                'jenis_transaksi' => 'required',
                'pesan_order' => 'required',
                'jumlah_order' => 'required',
                'harga_order' => 'required|numeric'
            ],[
                'user_order.required' => 'Nama Pemesan tidak boleh kosong',
                'jenis_transaksi.required' => 'Jenis Transaksi tidak boleh kosong',
                'pesan_order.required' => 'pesan_order tidak boleh kosong',
                'jumlah_order.required' => 'Waktu Order tidak boleh kosong',
                'harga_order.required' => 'Harga Order tidak boleh kosong',
                'harga_order.numeric' => 'Harga Order harus berupa angka'
            ]
        );

        $token = "adm" . date('His');
        $listorder = ListOrder::create([
            'token' => $token,
            'user_order' => $request->user_order,
            'jenis_transaksi' => $request->jenis_transaksi,
            'jumlah_order' => $request->jumlah_order,
            'harga_order' => $request->harga_order,
            'pesan_order' => $request->pesan_order,
            'status_order' => "Selesai"
        ]);

        DetailOrder::create([
            'list_id' => $listorder->id,
        ]);

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/laporan')->with('sukses', 'Berhasil Tambah Data!');
        } elseif (auth()->user()->roles_id == 2) {
            return redirect('seller/laporan')->with('sukses', 'Berhasil Tambah Data!');
        }
    }

    public function show(string $id)
    {
        $order = ListOrder::where('id', $id)->first();
        return view('admin.transaksi.read', compact('order'));
    }

    public function edit(string $id)
    {
        $order = ListOrder::where('id', $id)->first();
        $detail = DetailOrder::where('list_id', $id)->first();
        return view('admin.transaksi.update', compact('order', 'detail'));
    }

    public function update(Request $request, string $id)
    {

        $order = ListOrder::where('id', $id)->first();
        $order->update(
            [
                'status_order' => $request->status_order,
                ]
            );

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/transaksi')->with('sukses', 'Berhasil Edit Data!');
        } elseif (auth()->user()->roles_id == 2) {
            return redirect('seller/transaksi')->with('sukses', 'Berhasil Edit Data!');
        }
    }

    public function destroy(string $id)
    {
        $data = ListOrder::findOrFail($id);
        $data->delete();

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/transaksi')->with('sukses', 'Berhasil Hapus Data!');
        }
    }
}
