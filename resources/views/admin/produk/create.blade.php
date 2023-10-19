@extends('layouts.admin.app')

@section('title', 'Tambah produk')

@section('content')

    <!--tambah produk-->
    <div class="col-lg-12 col-lg-12 form-wrapper" id="tambah-produk">
        @if (auth()->user()->roles_id == 1)
            <form method="POST" action="{{ route('admin.produk.store') }}" enctype='multipart/form-data'>
            @elseif(auth()->user()->roles_id == 2)
                <form method="POST" action="{{ route('seller.produk.store') }}" enctype='multipart/form-data'>
        @endif
        @csrf
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <b>Tambah Produk</b>
                </h4>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-sm">
                        Simpan
                    </button>
                </div>
            </div>
            <div class="card-body p-3 bg-success text-white">
                @csrf
                <div class="d-flex justify-content-center m-4">
                    <label for="gambar_produk" style="cursor: pointer">
                        <i class="fa-solid fa-camera fa-2xl" id="ikon_fa"></i>
                        <input type="file" onchange="loadFile(event)" class="visually-hidden" name="gambar_produk"
                            id="gambar_produk" required>
                        @error('gambar_produk')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </label>
                    <img src="" id="output" style="width:200px !important; height:200px !important;"
                        class="img-circle elevation-2 visually-hidden" alt="">
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Kategori : </label>
                    <div class="col-sm-9">
                        <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id"
                            id="kategori_id" required>
                            <option value="">Pilih kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                            @error('kategori_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Nama Produk:
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                            value="{{ old('nama_produk') }}" name="nama_produk" id="nama_produk" placeholder="Nama Produk"
                            required />
                        @error('nama_produk')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Deskripsi : </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('deskripsi_produk') is-invalid @enderror"
                            value="{{ old('deskripsi_produk') }}" name="deskripsi_produk" id="deskripsi_produk"
                            placeholder="Deskripsi" required>
                        @error('deskripsi_produk')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Stok :
                    </label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control @error('stok_produk') is-invalid @enderror"
                            value="{{ old('stok_produk') }}" name="stok_produk" id="stok_produk" placeholder="2"
                            required />
                        @error('stok_produk')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Harga : </label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control @error('harga_produk') is-invalid @enderror"
                            value="{{ old('harga_produk') }}" name="harga_produk" id="harga_produk" placeholder="50000"
                            required />
                        @error('harga_produk')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!--./tambah produk-->

@endsection
@section('script')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            var ikon = document.getElementById('ikon_fa');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
                ikon.classList.add("visually-hidden");
                output.classList.remove("visually-hidden");
            }
        };
    </script>
@endsection
