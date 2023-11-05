<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $seller = User::where('roles_id', 2)->count();
        $customer = User::where('roles_id', 3)->count();
        $produk = Produk::all()->count();
        $kategori = Kategori::all()->count();

        $produks = Produk::latest('id')->get(); // Sort products by the latest ID in descending order
        $kategoris = Kategori::latest('id')->get(); // Sort categories by the latest ID in descending order

        if (auth()->user()->roles_id == 1){
            return view('admin.dashboard', compact('user', 'seller', 'customer', 'produk', 'kategori'));
        } else if (auth()->user()->roles_id == 2){
            return view('admin.dashboard', compact('seller', 'customer', 'produk', 'kategori'));
        } else if (auth()->user()->roles_id == 3){
            return view('client.dashboard', compact('produks', 'kategoris'));
        }
    }
}
