@extends('layouts.app')

@section('title', 'Registrasi')

@section('content')
    <div class="d-flex vh-100 justify-content-center">
        <div class="d-flex justify-content-center align-items-center flex-column pt-4">

            <form action="{{ route('register') }}" method="POST"
                class="d-flex flex-column gap-3 justify-content-center align-items-center w-100">
                @csrf
                <input class="border-0 rounded-3 py-2 px-3 w-75 @error('nama') is-invalid @enderror"
                    value="{{ old('nama') }}" required autocomplete="nama" autofocus type="text" name="nama"
                    placeholder="Nama" required>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input class="border-0 rounded-3 py-2 px-3 w-75  @error('email') is-invalid @enderror" type="email"
                    name="email" placeholder="Email" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input class="border-0 rounded-3 py-2 px-3 w-75  @error('no_telepon') is-invalid @enderror" type="text"
                    name="no_telepon" placeholder="Nomor Telepon : 08..." required>
                @error('no_telepon')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input class="border-0 rounded-3 py-2 px-3 w-75  @error('alamat') is-invalid @enderror" type="text"
                    name="alamat" id="alamat" placeholder="Alamat">
                @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input class="border-0 rounded-3 py-2 px-3 w-75 @error('password') is-invalid @enderror" type="password"
                    name="password" id="password" placeholder="Password" required autocomplete="current-password">
                <input class="border-0 rounded-3 py-2 px-3 w-75 @error('password') is-invalid @enderror" type="password"
                    name="password_confirmation" id="password-confirm" placeholder="Konfirmasi Password" required
                    autocomplete="current-password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn w-25 mt-2 bg-primary text-white">Daftar</button>
                <p>Sudah punya akun? <a class="text-white font-weight-bold" href="{{ route('login') }}">Masuk</a></p>
            </form>
            <div class="w-100  mt-4 pt-4"></div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
@endsection
