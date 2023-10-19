@extends('layouts.admin.app')

@section('title', 'Update Profile')

@section('backlink')
    <a href="{{ route('dashboard') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
@endsection

@section('content')

    <!--Edit user-->
    <div class="col-lg-12 col-lg-12 form-wrapper" id="edit-user">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype='multipart/form-data'>
                    @csrf
                    <div class="d-flex justify-content-center m-4">
                        <label for="gambar_user" style="cursor: pointer">
                            @if ($user->gambar_user == null)
                                <i class="fa-solid fa-camera fa-2xl" id="ikon_fa"></i>
                                <input type="file" onchange="loadFile(event)" class="visually-hidden" name="gambar_user"
                                    id="gambar_user" enabled>
                                @error('gambar_user')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @else
                                <img src="{{ asset('assets/profile') }}/{{ $user->gambar_user }}" id="ikon_fa"
                                    style="width:200px !important; height:200px !important;" class="img-circle elevation-2"
                                    alt="">
                                @error('gambar_user')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endif
                            <img src="" id="output"
                                style="max-width: 200px; max-height:200px; aspect-ratio: 1 / 1;"
                                class="img-circle elevation-2 visually-hidden" alt="">
                        </label>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                placeholder="nama" name="nama" id="nama" value="{{ $user->nama }}" enabled>
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="email" name="email" id="email" value="{{ $user->email }}" enabled>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Gambar User</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control @error('gambar_user') is-invalid @enderror"
                                placeholder="gambar_user" name="gambar_user" id="gambar_user"
                                value="{{ $user->gambar_user }}" enabled>
                            @error('gambar_user')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">No Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('no_telepon') is-invalid @enderror"
                                placeholder="no_telepon" name="no_telepon" id="no_telepon" value="{{ $user->no_telepon }}"
                                enabled>
                            @error('no_telepon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="password" name="password" id="password" enabled>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--./Edit user-->

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
