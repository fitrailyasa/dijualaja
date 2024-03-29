@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="vh-100 justify-content-center d-flex mb-4 mt-0">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <h3 class="text-white font-weight-bold mb-4">LOGIN</h3>
            <form action="{{ route('login') }}" method="POST"
                class="d-flex flex-column gap-3 justify-content-center align-items-center w-100">
                @csrf
                <input class="border-0 rounded-3 py-2 px-3 w-100 @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autofocus type="text" name="email" id="email"
                    placeholder="Email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input class="border-0 rounded-3 py-2 px-3 w-100 @error('password') is-invalid @enderror" name="password"
                    required type="password" id="password" placeholder="Password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn w-50 my-3 bg-primary text-white">Masuk</button>
            </form>
            <p>Belum punya akun? <a class="text-white font-weight-bold" href="{{ route('register') }}">Daftar</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
@endsection
