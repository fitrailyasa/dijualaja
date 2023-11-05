<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminkategoriController extends Controller
{
    public function index():View
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kategori' => 'required|max:255'
            ],
            [
                'nama_kategori.required' => 'Nama kategori Tidak Boleh Kosong!',
                'nama_kategori.max' => 'Nama kategori Terlalu Panjang!'
            ]
        );

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        $validasi = $request->validate([
            'gambar_kategori' => 'required|mimes:jpg,bmp,png,svg,jpeg|max:1280 ',
        ]);

        $file = $validasi[('gambar_kategori')];
        $kategori->gambar_kategori = time().'_'.$file->getClientOriginalName();
        $kategori->update();
        $nama_file = time().'_'.$file->getClientOriginalName();

        $location = '../public/assets/img';

        $file->move($location,$nama_file);

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/kategori')->with('sukses', 'Berhasil Tambah Data!');
        } else if (auth()->user()->roles_id == 2) {
            return redirect('seller/kategori')->with('sukses', 'Berhasil Tambah Data!');
        }
    }

    public function show(string $id)
    {
        $kategoris = Kategori::findOrFail($id);
        $produks = Produk::where('kategori_id', $id)->get();
        return view('admin.produk.index', compact('kategoris', 'produks'));
    }

    public function edit(string $id)
    {
        $kategori = Kategori::where('id', $id)->first();
        return view('admin.kategori.update', compact('kategori'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_kategori' => 'required|max:255'
            ],[
                'nama_kategori.required' => 'Nama kategori Tidak Boleh Kosong!',
                'nama_kategori.max' => 'Nama kategori Terlalu Panjang!'
            ]
        );

        $kategori = Kategori::where('id', $id)->first();
        $kategori->update(
            [
                'nama_kategori' => $request->nama_kategori
            ]
        );

        $validasi = $request->validate(
            [
                'gambar_kategori' => 'mimes:jpg,bmp,png,svg,jpeg|max:2560 ',
            ],
            [
                'gambar_kategori.mimes' => 'Ikon kategori Harus Berupa File: jpg,bmp,png,svg,jpeg!',
                'gambar_kategori.max' => 'Ikon kategori Terlalu Besar!'
            ]
        );

        if($request->hasFile('gambar_kategori')){
            $gambar_kategori = $validasi[('gambar_kategori')];
            $kategori->gambar_kategori = time().'_'.$gambar_kategori->getClientOriginalName();
            $kategori->update();
            $gambar_kategori->move('../public/assets/img',time().'_'.$gambar_kategori->getClientOriginalName());
        }

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/kategori/'.$id.'/edit')->with('sukses', 'Berhasil Edit Data!');
        } else if (auth()->user()->roles_id == 2) {
            return redirect('seller/kategori/'.$id.'/edit')->with('sukses', 'Berhasil Edit Data!');
        }
    }

    public function destroy(string $id)
    {
        $data = Kategori::findOrFail($id);
        $data->delete();

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/kategori')->with('sukses', 'Berhasil Hapus Data!');
        } else if (auth()->user()->roles_id == 2) {
            return redirect('seller/kategori')->with('sukses', 'Berhasil Hapus Data!');
        }
    }
}
