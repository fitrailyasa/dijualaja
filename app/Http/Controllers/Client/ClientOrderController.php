<?php

namespace App\Http\Controllers\Client;

use App\Models\ListOrder;
use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientOrderController extends Controller
{
    public function index()
    {
        $orders = ListOrder::where('user_id', Auth::user()->id)
        ->orderBy('id', 'desc')
        ->get();
        return view('client.order.index', compact('orders'));
    }

    public function create()
    {
        $order = Produk::first();
        return view('client.order.create', compact('order'));
    }

    public function order(string $id)
    {
        $order = Produk::where('id', $id)->first();
        $now = date('Y-m-d H:i:s');
        return view('client.order.create', compact('order', 'now'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'user_order' => 'required|max:255',
                'produk' => 'required',
                'no_telepon' => 'required',
                'jumlah_order' => 'required',
                'alamat_order' => 'required',
                'harga_order' => 'required',
                'pesan_order' => 'required',
                'opsi_pengiriman' => 'required',
                'pembayaran' => 'required',
                'foto_pembayaran' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            ],
            [
                'user_order.required' => 'Nama Pemesan tidak boleh kosong',
                'user_order.max' => 'Nama Pemesan tidak boleh lebih dari 255 karakter',
                'produk.required' => 'Produk tidak boleh kosong',
                'no_telepon.required' => 'Nomor Telepon tidak boleh kosong',
                'jumlah_order.required' => 'Waktu Order tidak boleh kosong',
                'alamat_order.required' => 'Alamat Order tidak boleh kosong',
                'harga_order.required' => 'Harga Order tidak boleh kosong',
                'pesan_order.required' => 'pesan_order tidak boleh kosong',
                'opsi_pengiriman.required' => 'Opsi Pengiriman tidak boleh kosong',
                'pembayaran.required' => 'Pembayaran tidak boleh kosong',
                'no_rekening.required' => 'Nomor Rekening tidak boleh kosong',
                'foto_pembayaran.mimes' => 'Foto Pembayaran harus berupa file: jpg, bmp, png, svg, jpeg, heif, hevc',
                'foto_pembayaran.max' => 'Foto Pembayaran tidak boleh lebih dari 10 MB',
            ]
        );

        $token = "usr" . date('His');
        
        $listorder = ListOrder::create(
            [
                'token' => $token,
                'user_id' => auth()->user()->id,
                'user_order' => $request->user_order,
                'produk' => $request->produk,
                'no_telepon' => $request->no_telepon,
                'jenis_transaksi' => 'pemasukan',
                'jumlah_order' => $request->jumlah_order,
                'alamat_order' => $request->alamat_order,
                'harga_order' => $request->harga_order,
                'status_order' => 'Menunggu Konfirmasi',
                'pesan_order' => $request->pesan_order
                ]
            );

        $detailorder = DetailOrder::create([
            'list_id' => $listorder->id,
            'opsi_pengiriman' => $request->opsi_pengiriman,
            'pembayaran' => $request->pembayaran,
            'no_rekening' => $request->no_rekening
        ]);
        
        $validasi = $request->validate([
            'foto_pembayaran' => 'mimes:jpg,bmp,png,svg,jpeg|max:2560 ',
        ]);
        if($request->hasFile('foto_pembayaran')){
            $foto_pembayaran = $validasi[('foto_pembayaran')];
            $detailorder->foto_pembayaran = time().'_'.$foto_pembayaran->getClientOriginalName();
            $detailorder->update();
            $foto_pembayaran->move('../public/assets/img/pembayaran/',time().'_'.$foto_pembayaran->getClientOriginalName());
        }

        $dd($listorder);
        $dd($detailorder);
        exit();

        if (auth()->user()->roles_id == 3) {
            return redirect('customer/order')->with('sukses', 'Berhasil Order!');
        }
    }

    public function show(string $id)
    {
        $order = ListOrder::where('id', $id)->first();
        $detail = DetailOrder::where('list_id', $id)->first();
        return view('client.order.read', compact('order', 'detail'));
    }
}
