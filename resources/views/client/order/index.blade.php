@extends('layouts.client.app')

@section('title', 'List Order')

@section('content')

    <div class="vh-100">
        <div class="d-flex px-3 pt-4">
            <section class="nav-section py-3 px-4 d-flex align-items-center gap-1" style="font-size: 20px;">
                <a href="/member" style="color:#E2DFEB;"><i class="fa-solid fa-arrow-left font-weight-bolder"></i>
                    <span class="fw-bolder px-2">Transaksi</span>
                </a>
            </section>
        </div>

        <section class="row d-flex justify-content-center">
            <p class="row justify-content-center text-white">
                Menampilkan semua riwayat transaksi
            </p>
            <hr class="row w-75" style="background-color: #E2DFEB; color: #fff; height: 3px;">
        </section>

        <section class="w-100 d-flex flex-column justify-content-center align-items-center" style="padding-bottom: 15vh;">
            @foreach ($orders->where('user_id') as $order)
                <div class="card p-2 rounded-3" style="width: 75%;">
                    <div class="d-flex mb-3">
                        <div class="d-flex justify-content-center align-content-center">
                            <i class="fa-regular fa-file-lines p-3" style="font-size: 2rem;"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <p class="text-md fw-bolder">Pesanan #{{ $order->user_order }}</p>
                            <div class="d-flex">
                                <span class="text-md">
                                    {{ $order->waktu_order }}
                                </span>
                                <span class="text-md px-2 w-50">
                                    {{ Str::limit($order->keluhan, 8) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr class="col mt-0" style="background-color: white; color: #3d3c42; height: 3px;">
                    <div class="d-flex px-2 flex-row justify-content-between align-items-center">
                        <span class="">{{ $order->status_order }}</span>
                        @if (auth()->user()->roles_id == 3)
                            <a href="{{ route('customer.m-order.show', $order->id) }}" class="text-decoration-none">
                                <button class="btn border border-3">Detail</button>
                            </a>
                        @endif

                    </div>
                </div>
            @endforeach
        </section>
    </div>

@endsection

@include('menu')
