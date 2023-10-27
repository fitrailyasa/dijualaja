@extends('layouts.admin.app')

@section('title', 'Tambah Kategori')

@section('backlink')
    @if (auth()->user()->roles_id == 1)
        <a href="{{ route('admin.kategori.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @elseif (auth()->user()->roles_id == 2)
        <a href="{{ route('seller.kategori.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @endif
@endsection

@section('content')

    <!--tambah kategori-->
    <div class="col-lg-12 col-lg-12 form-wrapper" id="tambah-kategori">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->roles_id == 1)
                    <form method="POST" action="{{ route('admin.kategori.store') }}" enctype='multipart/form-data'>
                    @elseif (auth()->user()->roles_id == 2)
                        <form method="POST" action="{{ route('seller.kategori.store') }}" enctype='multipart/form-data'>
                @endif
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                            placeholder="Masukkan kategori" name="nama_kategori" id="nama_kategori" required>
                        @error('nama_kategori')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Gambar</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control @error('gambar_kategori') is-invalid @enderror"
                            placeholder="Masukkan kategori" name="gambar_kategori" id="gambar_kategori" required>
                        @error('gambar_kategori')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
    <!--./tambah kategori-->
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
