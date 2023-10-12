@extends('layouts.app')

@section('title', 'Verifikasi')

@section('content')
    <div class="vh-100 d-flex justify-content-center">
        <div class="d-flex justify-content-center align-items-center flex-column w-100">
            <img src="{{asset('assets/img/main-logo.png')}}" style="width: 20rem;" alt="">
            <span class="text-white text-lg fw-medium text-center px-2">Akun anda berhasil dibuat, hubungi admin untuk verifikasi</span>
            <div class="d-flex flex-row gap-3 pt-4">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span class="mx-2">Minta verifikasi admin</span>
                </a>
                <a href="{{route('login')}}" class="d-flex text-decoration-none">
                    <button class="btn btn-primary text-white">Login</button>
                </a>
            </div>
        </div>
    </div>
@endsection
