<?php

namespace App\Http\Controllers\Client;

use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientprodukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('client.produk.index', compact('produks'));
    }
}
