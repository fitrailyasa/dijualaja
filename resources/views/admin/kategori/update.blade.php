@extends('layouts.admin.app')

@section('title', 'Edit Kategori')

@section('backlink')
    @if (auth()->user()->roles_id == 1)
        <a href="{{ route('admin.kategori.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @elseif (auth()->user()->roles_id == 2)
        <a href="{{ route('seller.kategori.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @endif
@endsection

@section('content')

    <!--edit kategori-->
    <div class="col-lg-12 col-lg-12 form-wrapper" id="edit-kategori">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->roles_id == 1)
                    <form method="POST" action="{{ route('admin.kategori.show', $kategori->id) }}"
                        enctype='multipart/form-data'>
                    @elseif (auth()->user()->roles_id == 2)
                        <form method="POST" action="{{ route('seller.kategori.show', $kategori->id) }}"
                            enctype='multipart/form-data'>
                @endif
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-center m-4">
                    <label for="gambar_kategori" style="cursor: pointer">
                        @if ($kategori->gambar_kategori == null)
                            <i class="fa-solid fa-camera fa-2xl" id="ikon_fa"></i>
                            <input type="file" onchange="loadFile(event)" class="visually-hidden" name="gambar_kategori"
                                id="gambar_kategori" enabled>
                            @error('gambar_kategori')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @else
                            <img src="{{ asset('assets/img') }}/{{ $kategori->gambar_kategori }}" id="ikon_fa"
                                style="width:200px !important; height:200px !important;" class="img-circle elevation-2"
                                alt="">
                            @error('gambar_kategori')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endif
                        <img src="" id="output" style="max-width: 200px; max-height:200px; aspect-ratio: 1 / 1;"
                            class="img-circle elevation-2 visually-hidden" alt="">
                    </label>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                            placeholder="Kategori" name="nama_kategori" id="nama_kategori"
                            value="{{ $kategori->nama_kategori }}" required>
                        @error('nama_kategori')
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
    <!--./edit kategori-->

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
