<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'kategori_id' => 'required',
                'nama_produk' => 'required|max:255',
                'deskripsi_produk' => 'required',
                'stok_produk' => 'required|numeric',
                'harga_produk' => 'required|numeric',
            ],[
                'kategori_id.required' => 'kategori Tidak Boleh Kosong!',
                'nama_produk.required' => 'Nama Sub kategori Tidak Boleh Kosong!',
                'nama_produk.max' => 'Nama Sub kategori Terlalu Panjang!',
                'deskripsi_produk.required' => 'Deskripsi Sub kategori Tidak Boleh Kosong!',
                'stok_produk.required' => 'Waktu Sub kategori Tidak Boleh Kosong!',
                'stok_produk.numeric' => 'Waktu Sub kategori Harus Berupa Angka!',
                'harga_produk.required' => 'Harga Sub kategori Tidak Boleh Kosong!',
                'harga_produk.numeric' => 'Harga Sub kategori Harus Berupa Angka!',
            ]
        );

        $produk = Produk::create([
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'stok_produk' => $request->stok_produk,
            'harga_produk' => $request->harga_produk
        ]);
        

        $validasi = $request->validate(
            [
                'gambar_produk' => 'mimes:jpg,bmp,png,svg,jpeg|max:2560 ',
            ],[
                'gambar_produk.mimes' => 'Format Ikon Tidak Sesuai!',
                'gambar_produk.max' => 'Ukuran Ikon Terlalu Besar!',
            ]
        );

        $file = $validasi[('gambar_produk')];
        $produk->gambar_produk = time().'_'.$file->getClientOriginalName();
        $produk->update();
        $nama_file = time().'_'.$file->getClientOriginalName();

        $location = '../public/assets/img';

        $file->move($location,$nama_file);

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/produk')->with('sukses', 'Berhasil Tambah Data!');
        } elseif (auth()->user()->roles_id == 2) {
            return redirect('seller/produk')->with('sukses', 'Berhasil Tambah Data!');
        }
    }

    public function show(string $id)
    {
        $produk = Produk::where('id', $id)->first();
        $kategoris = Kategori::all();
        return view('admin.produk.read', compact('produk', 'kategoris'));
    }

    public function edit(string $id)
    {
        $produk = Produk::where('id', $id)->first();
        $kategoris = Kategori::all();
        return view('admin.produk.update', compact('produk', 'kategoris'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_produk' => 'required|max:255',
                'deskripsi_produk' => 'required',
                'stok_produk' => 'required|numeric',
                'harga_produk' => 'required|numeric',
            ],[
                'nama_produk.required' => 'Nama Sub kategori Tidak Boleh Kosong!',
                'nama_produk.max' => 'Nama Sub kategori Terlalu Panjang!',
                'deskripsi_produk.required' => 'Deskripsi Sub kategori Tidak Boleh Kosong!',
                'stok_produk.required' => 'Waktu Sub kategori Tidak Boleh Kosong!',
                'stok_produk.numeric' => 'Waktu Sub kategori Harus Berupa Angka!',
                'harga_produk.required' => 'Harga Sub kategori Tidak Boleh Kosong!',
                'harga_produk.numeric' => 'Harga Sub kategori Harus Berupa Angka!',
            ]
        );

        $produk = Produk::where('id', $id)->first();
        $produk->update(
            [
                'kategori_id' => $request->kategori_id,
                'nama_produk' => $request->nama_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
                'stok_produk' => $request->stok_produk,
                'harga_produk' => $request->harga_produk
            ]
        );
        
        $validasi = $request->validate(
            [
                'gambar_produk' => 'mimes:jpg,bmp,png,svg,jpeg|max:1280 ',
            ],[
                'gambar_produk.mimes' => 'Format Ikon Tidak Sesuai!',
                'gambar_produk.max' => 'Ukuran Ikon Terlalu Besar!',
            ]
        );

        if($request->hasFile('gambar_produk')){
            $gambar_produk = $validasi[('gambar_produk')];
            $produk->gambar_produk = time().'_'.$gambar_produk->getClientOriginalName();
            $produk->update();
            $gambar_produk->move('../public/assets/img',time().'_'.$gambar_produk->getClientOriginalName());
        }

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/produk/'.$id.'/edit')->with('sukses', 'Berhasil Edit Data!');
        } elseif (auth()->user()->roles_id == 2) {
            return redirect('seller/produk/'.$id.'/edit')->with('sukses', 'Berhasil Edit Data!');
        }
    }

    public function destroy(string $id)
    {
        $data = Produk::where('id', $id)->first();
        $data->delete();

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/produk')->with('sukses', 'Berhasil Hapus Data!');
        } elseif (auth()->user()->roles_id == 2) {
            return redirect('seller/produk')->with('sukses', 'Berhasil Hapus Data!');
        }
    }
}
