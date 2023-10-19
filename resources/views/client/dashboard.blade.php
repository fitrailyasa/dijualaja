@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <header class="px-3 py-2 border-bottom text-white mb-3 fixed-top" style="background-color: #117b46">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <img class="img-fluid" width="60" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                <div class="d-none d-lg-block">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mx-3 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-3 text-white fw-bold fs-5">Home</a></li>
                        <li><a href="#" class="nav-link px-3 text-white fw-bold fs-5">Produk</a></li>
                        <li><a href="#" class="nav-link px-3 text-white fw-bold fs-5">Kategori</a></li>
                    </ul>
                </div>
                <div class="d-flex align-items-center">
                    <a href="#" class="nav-link px-2 text-white fw-bold">
                        <i class="fa-solid fa-shopping-cart fs-4"></i>
                    </a>
                    <a href="#" class="ml-4 border rounded-circle nav-link px-2 text-white fw-bold d-none d-lg-block">
                        <i class="fa-solid fa-user fs-4 px-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="px-3 my-5 py-2">
        <div class="row mt-5 mb-3">
            @foreach ($produks as $produk)
                <div class="col-xl-2 col-md-6 col-6 mb-3">
                    <div class="card text-start rounded-4">
                        <div class="text-center p-2">
                            @if ($produk->gambar_produk)
                                <img height="100" class=""
                                    src="{{ asset('assets/img') }}/{{ $produk->gambar_produk }}"
                                    alt="{{ $produk->nama_produk }}">
                            @else
                                <img height="100" class="" src="{{ asset('assets/img/default.png') }}"
                                    alt="{{ $produk->nama_produk }}">
                            @endif
                        </div>
                        <div class="p-3 border-top">
                            <h4 class="card-title">{{ $produk->nama_produk }}</h4>
                            {{-- <p class="card-text">{{ \Illuminate\Support\Str::limit($produk->deskripsi_produk, 50) }}</p> --}}
                            <p class="card-text fw-bold">Rp. {{ $produk->harga_produk }}</p>
                            <button class="btn btn-sm btn-primary" data-id="{{ $produk->id }}">Detail</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <footer class="px-3 py-2 d-block d-lg-none border-top text-white mt-3 fixed-bottom" style="background-color: #117b46">
        <div class="container">
            <div class="d-flex">
                <ul class="nav col-12 align-items-center justify-content-between">
                    <li><a href="#" class="nav-link px-2 text-white fw-bold"><i
                                class="fa-solid fa-house fs-4"></i></a></li>
                    <li><a href="#" class="nav-link px-2 text-white fw-bold"><i class="fa-solid fa-box fs-4"></i></a>
                    </li>
                    <li><a href="#" class="nav-link px-2 text-white fw-bold"><i class="fa-solid fa-tag fs-4"></i></a>
                    </li>
                    <li><a href="#" class="nav-link px-2 text-white fw-bold"><i class="fa-solid fa-user fs-4"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

@endsection

@section('script')

@endsection
