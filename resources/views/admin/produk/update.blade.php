@extends('layouts.admin.app')

@section('title', 'Edit Produk')

@section('backlink')
    @if (auth()->user()->roles_id == 1)
        <a href="{{ route('admin.produk.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @elseif (auth()->user()->roles_id == 2)
        <a href="{{ route('seller.produk.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @endif
@endsection

@section('content')

    <!--edit produk-->
    <div class="col-lg-12 col-lg-12 form-wrapper" id="edit-produk">
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
                            <input type="file" onchange="loadFile(event)" class="visually-hidden" name="gambar_produk"
                                id="gambar_produk" enabled>
                            @error('gambar_produk')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @else
                            <img src="{{ asset('assets/img') }}/{{ $produk->gambar_produk }}" id="ikon_fa"
                                style="width:200px !important; height:200px !important;" class="img-circle elevation-2"
                                alt="">
                            @error('gambar_produk')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endif
                        <img src="" id="output" style="max-width: 200px; max-height:200px; aspect-ratio: 1 / 1;"
                            class="img-circle elevation-2 visually-hidden" alt="">
                    </label>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Masukkan nama produk" name="nama_produk"
                            id="nama_produk" value="{{ $produk->nama_produk }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Deskripsi produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Masukkan deskripsi produk"
                            name="deskripsi_produk" id="deskripsi_produk" value="{{ $produk->deskripsi_produk }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Harga produk</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" placeholder="Masukkan harga produk" name="harga_produk"
                            id="harga_produk" value="{{ $produk->harga_produk }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Stok produk</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" placeholder="Masukkan stok produk" name="stok_produk"
                            id="stok_produk" value="{{ $produk->stok_produk }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Kategori produk</label>
                    <div class="col-sm-9">
                        <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id"
                            id="kategori_id">
                            @foreach ($kategoris as $kategori)
                                @if ($kategori->id == $produk->kategori_id)
                                    <option value="{{ $kategori->id }}" selected>{{ $kategori->nama_kategori }}
                                    </option>
                                @else
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--./edit produk-->

@endsection
@section('script')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
                output.classList.remove("visually-hidden");
            }
        };
    </script>
@endsection
