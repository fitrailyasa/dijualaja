<?php

namespace App\Http\Controllers\Client;

use App\Models\Produk;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::latest('id')->get();
        $kategoris = Kategori::latest('id')->get();
        return view('client.produk.index', compact('produks', 'kategoris'));
    }

    public function show(string $id)
    {
        $produks = Produk::where('id', $id)->first();
        return view('client.produk.show', compact('produks'));
    }
}
