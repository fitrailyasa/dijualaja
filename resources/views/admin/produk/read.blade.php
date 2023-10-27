@extends('layouts.admin.app')

@section('title', 'Detail Produk')

@section('backlink')
    @if (auth()->user()->roles_id == 1)
        <a href="{{ route('admin.produk.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @elseif (auth()->user()->roles_id == 2)
        <a href="{{ route('seller.produk.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @endif
@endsection

@section('content')

    <!--Detail produk-->
    <div class="col-lg-12 col-lg-12 form-wrapper" id="detail-produk">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->roles_id == 1)
                    <form method="POST" action="{{ route('admin.produk.show', $produk->id) }}" enctype='multipart/form-data'>
                    @elseif (auth()->user()->roles_id == 2)
                        <form method="POST" action="{{ route('seller.produk.show', $produk->id) }}"
                            enctype='multipart/form-data'>
                @endif
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-center m-4">
                    <label for="gambar_produk" style="cursor: pointer">
                        @if ($produk->gambar_produk == null)
                            <i class="fa-solid fa-camera fa-2xl" id="ikon_fa"></i>
                        @else
                            <img src="{{ asset('assets/img') }}/{{ $produk->gambar_produk }}" id="ikon_fa"
                                style="width:200px !important; height:200px !important;" class="img-circle elevation-2"
                                alt="">
                        @endif
                        <img src="" id="output" style="max-width: 200px; max-height:200px; aspect-ratio: 1 / 1;"
                            class="img-circle elevation-2 visually-hidden" alt="">
                    </label>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="nama produk" name="nama_produk"
                            id="nama_produk" value="{{ $produk->nama_produk }}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Deskripsi produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="deskripsi produk" name="deskripsi_produk"
                            id="deskripsi_produk" value="{{ $produk->deskripsi_produk }}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Harga produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="harga produk" name="harga_produk"
                            id="harga_produk" value="{{ $produk->harga_produk }}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Stok produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="stok produk" name="stok_produk"
                            id="stok_produk" value="{{ $produk->stok_produk }}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Kategori produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="kategori produk" name="kategori_id"
                            id="kategori_id" value="{{ $produk->kategori->nama_kategori }}" disabled>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="text-right">
                        @if (auth()->user()->roles_id == 1)
                            <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-primary">Edit</a>
                        @elseif (auth()->user()->roles_id == 2)
                            <a href="{{ route('seller.produk.edit', $produk->id) }}" class="btn btn-primary">Edit</a>
                        @endif
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!--./Detail produk-->

    @endsection
