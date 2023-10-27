@extends('layouts.admin.app')

@section('title', 'Edit User')

@section('backlink')
    @if (auth()->user()->roles_id == 1)
        <a href="{{ route('admin.user.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @elseif (auth()->user()->roles_id == 2)
        <a href="{{ route('seller.user.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @endif
@endsection

@section('content')

    <!--Edit user-->
    <div class="col-lg-12 col-lg-12 form-wrapper" id="edit-user">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->roles_id == 1)
                    <form method="POST" action="{{ route('admin.user.update', $user->id) }}" enctype='multipart/form-data'>
                @endif
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-center m-4">
                    <label for="gambar_user">
                        @if ($user->gambar_user == null)
                            <img src="{{ asset('assets/profile') ?? 'Data Kosong' }}/default.png"
                                class="img-circle elevation-2" style="width:200px !important; height:200px !important;"
                                alt="">
                            <input type="file" class="visually-hidden" accept="image/*" onchange="loadFile(event)"
                                placeholder="gambar_user" name="gambar_user" id="gambar_user" enabled>
                            @error('gambar_user')
                                <span class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message ?? 'Data Kosong' }}</strong>
                                </span>
                            @enderror
                        @else
                            <img src="{{ asset('assets/profile') ?? 'Data Kosong' }}/{{ $user->gambar_user ?? 'Data Kosong' }}"
                                style="width:200px !important; height:200px !important;" class="img-circle elevation-2"
                                alt="">
                            <input type="file" class="visually-hidden" accept="image/*" onchange="loadFile(event)"
                                placeholder="gambar_user" name="gambar_user" id="gambar_user" enabled>
                            @error('gambar_user')
                                <span class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message ?? 'Data Kosong' }}</strong>
                                </span>
                            @enderror
                        @endif
                    </label>
                    <img src="" id="output" style="width:200px; height:200px;"
                        class="img-circle elevation-2 position-absolute visually-hidden" alt="">
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="nama"
                            name="nama" id="nama" value="{{ $user->nama ?? 'Data Kosong' }}" enabled>
                        @error('nama')
                            <div class="alert alert-danger">{{ $message ?? 'Data Kosong' }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email"
                            name="email" id="email" value="{{ $user->email ?? 'Data Kosong' }}" enabled>
                        @error('email')
                            <div class="alert alert-danger">{{ $message ?? 'Data Kosong' }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Gambar User</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control @error('gambar_user') is-invalid @enderror"
                            placeholder="gambar_user" name="gambar_user" id="gambar_user"
                            value="{{ $user->gambar_user ?? 'Data Kosong' }}" enabled>
                        @error('gambar_user')
                            <div class="alert alert-danger">{{ $message ?? 'Data Kosong' }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">No Telepon</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('no_telepon') is-invalid @enderror"
                            placeholder="no_telepon" name="no_telepon" id="no_telepon"
                            value="{{ $user->no_telepon ?? 'Data Kosong' }}" enabled>
                        @error('no_telepon')
                            <div class="alert alert-danger">{{ $message ?? 'Data Kosong' }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Password Baru</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="password" name="password" id="password" enabled>
                        @error('password')
                            <div class="alert alert-danger">{{ $message ?? 'Data Kosong' }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Roles ID</label>
                    <div class="col-sm-9">
                        <select class="col-sm-12 col-form-label rounded-2" name="roles_id" id="roles_id" enabled>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id ?? 'Data Kosong' }}"
                                    {{ $user->roles_id == $role->id ? 'selected' : '' ?? 'Data Kosong' }}>
                                    {{ $role->nama ?? 'Data Kosong' }}</option>
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
