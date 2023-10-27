@extends('layouts.admin.app')

@section('title', 'Tambah produk')

@section('backlink')
    @if (auth()->user()->roles_id == 1)
        <a href="{{ route('admin.produk.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @elseif (auth()->user()->roles_id == 2)
        <a href="{{ route('seller.produk.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @endif
@endsection

@section('content')

    <!--tambah produk-->
    <div class="col-lg-12 col-lg-12 form-wrapper" id="tambah-produk">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->roles_id == 1)
                    <form method="POST" action="{{ route('admin.produk.store') }}" enctype='multipart/form-data'>
                @endif
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Masukkan nama produk" name="nama_produk"
                            id="nama_produk" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Gambar produk</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="gambar_produk" id="gambar_produk" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Deskripsi produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Masukkan deskripsi produk"
                            name="deskripsi_produk" id="deskripsi_produk" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Harga produk</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" placeholder="Masukkan harga produk" name="harga_produk"
                            id="harga_produk" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Stok produk</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" placeholder="Masukkan stok produk" name="stok_produk"
                            id="stok_produk" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Kategori produk</label>
                    <div class="col-sm-9">
                        <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id"
                            id="kategori_id">
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
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
