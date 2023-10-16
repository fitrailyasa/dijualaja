@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <a href="{{ route('login') }}" class="">
        <div class="text-center mt-5 pt-5">
            <div class="mb-3">
                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                <h1 class="mb-5 pb-5 font-weight-bold">DIJUALAJA</h1>
            </div>

            <h4 class="m-3">TAP ANYWHERE</h4>
        </div>
    </a>
@endsection
