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
                'jenis_kategori' => 'required',
                'no_telepon' => 'required',
                'waktu_order' => 'required',
                'alamat_order' => 'required',
                'harga_order' => 'required',
                'keluhan' => 'required',
                'opsi_pengiriman' => 'required',
                'pembayaran' => 'required',
                'foto_keluhan' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
                'foto_pembayaran' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            ],
            [
                'user_order.required' => 'Nama Pemesan tidak boleh kosong',
                'user_order.max' => 'Nama Pemesan tidak boleh lebih dari 255 karakter',
                'jenis_kategori.required' => 'Jenis kategori tidak boleh kosong',
                'no_telepon.required' => 'Nomor Telepon tidak boleh kosong',
                'waktu_order.required' => 'Waktu Order tidak boleh kosong',
                'alamat_order.required' => 'Alamat Order tidak boleh kosong',
                'harga_order.required' => 'Harga Order tidak boleh kosong',
                'keluhan.required' => 'Keluhan tidak boleh kosong',
                'opsi_pengiriman.required' => 'Opsi Pengiriman tidak boleh kosong',
                'pembayaran.required' => 'Pembayaran tidak boleh kosong',
                'no_rekening.required' => 'Nomor Rekening tidak boleh kosong',
                'foto_keluhan.mimes' => 'Foto Keluhan harus berupa file: jpg, bmp, png, svg, jpeg, heif, hevc',
                'foto_keluhan.max' => 'Foto Keluhan tidak boleh lebih dari 10 MB',
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
                'jenis_kategori' => $request->jenis_kategori,
                'no_telepon' => $request->no_telepon,
                'jenis_transaksi' => 'pemasukan',
                'waktu_order' => $request->waktu_order,
                'alamat_order' => $request->alamat_order,
                'harga_order' => $request->harga_order,
                'status_order' => 'Menunggu Konfirmasi',
                'keluhan' => $request->keluhan
                ]
            );

        $detailorder = DetailOrder::create([
            'list_id' => $listorder->id,
            'opsi_pengiriman' => $request->opsi_pengiriman,
            'pembayaran' => $request->pembayaran,
            'no_rekening' => $request->no_rekening
        ]);
        
        $validasi = $request->validate([
            'foto_keluhan' => 'mimes:jpg,bmp,png,svg,jpeg|max:2560 ',
            'foto_pembayaran' => 'mimes:jpg,bmp,png,svg,jpeg|max:2560 ',
        ]);
        if($request->hasFile('foto_keluhan')){
            $foto_keluhan = $validasi[('foto_keluhan')];
            $detailorder->foto_keluhan = time().'_'.$foto_keluhan->getClientOriginalName();
            $detailorder->update();
            $foto_keluhan->move('../public/assets/img/keluhan/',time().'_'.$foto_keluhan->getClientOriginalName());
        }
        if($request->hasFile('foto_pembayaran')){
            $foto_pembayaran = $validasi[('foto_pembayaran')];
            $detailorder->foto_pembayaran = time().'_'.$foto_pembayaran->getClientOriginalName();
            $detailorder->update();
            $foto_pembayaran->move('../public/assets/img/pembayaran/',time().'_'.$foto_pembayaran->getClientOriginalName());
        }

        if (auth()->user()->roles_id == 3) {
            return redirect('customer/m-order')->with('sukses', 'Berhasil Order!');
        }
    }

    public function show(string $id)
    {
        $order = ListOrder::where('id', $id)->first();
        $detail = DetailOrder::where('list_id', $id)->first();
        return view('client.order.read', compact('order', 'detail'));
    }
}
