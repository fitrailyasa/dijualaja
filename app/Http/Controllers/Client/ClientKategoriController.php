<?php

namespace App\Http\Controllers\Client;

use App\Models\Kategori;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientKategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('client.kategori.index', compact('kategoris'));
    }

    public function show(string $id)
    {
        $kategoris = Kategori::findOrFail($id);
        $produks = Produk::where('kategori_id', $id)->get();
        return view('client.produk.index', compact('kategoris', 'produks'));
    }
}
