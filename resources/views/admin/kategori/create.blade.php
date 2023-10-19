@extends('layouts.admin.app')

@section('title', 'Tambah kategori')

@section('content')

    <!--tambah kategori-->
    <div class="col-lg-12 col-lg-12 form-wrapper" id="tambah-kategori">
        @if (auth()->user()->roles_id == 1)
            <form method="POST" action="{{ route('admin.kategori.store') }}" enctype='multipart/form-data'>
        @endif
        @csrf
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    @if (auth()->user()->roles_id == 1)
                        <a class="pr-3 text-dark" href="{{ route('admin.kategori.index') }}"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i></a>
                    @endif
                    <b>Tambah kategori</b>
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
                    <label for="gambar_kategori" class="justify-content-center d-flex align-items-center"
                        style="cursor: pointer">
                        <i class="fa-solid fa-camera fa-2xl" id="ikon_fa"></i>
                        <input type="file" onchange="loadFile(event)" class="visually-hidden" name="gambar_kategori"
                            id="gambar_kategori" enabled>
                        @error('gambar_kategori')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <img src="" id="output" style="width:200px !important; height:200px !important;"
                            class="img-circle elevation-2 visually-hidden" alt="">
                    </label>
                </div>
                <div class="mb-3 pb-4 row">
                    <label class="col-sm-3 col-form-label">Nama kategori :
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                            value="{{ old('nama_kategori') }}" name="nama_kategori" id="nama_kategori"
                            placeholder="Nama kategori" required />
                        @error('nama_kategori')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        </form>
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
