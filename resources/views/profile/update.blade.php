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
                    @method('PUT')
                    @csrf
                    <div class="d-flex justify-content-center m-4">
                        @if (Auth::user()->gambar_user)
                            <img src="{{ asset('assets/profile') }}/{{ auth()->user()->gambar_user }}"
                                class="img-circle elevation-2" alt="User Image"
                                style="width: 200px; height: 200px; object-fit: cover; object-position: center; border-radius: 50%;">
                        @else
                            <img src="{{ asset('assets/profile/default.png') }}" alt="User Image"
                                style="width: 200px; height: 200px; object-fit: cover; object-position: center; border-radius: 50%;">
                        @endif

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
