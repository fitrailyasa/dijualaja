@extends('layouts.client.app')

@section('title', 'Produk')

@section('content')
    <div class="vh-100 mt-5 pt-5">
        <section class="px-4 body-section d-flex flex-column gap-3 pt-3" style="padding-bottom: 100px">
            @foreach ($produks as $produk)
                <div class="d-flex align-items-center bg-white rounded-4 px-4 py-2">
                    <div class="d-flex">
                        @if ($produk->gambar_produk == null)
                            <img src="{{ asset('assets/img') }}/default.png" alt="ikon"
                                style="width: 4.2rem; height: 4.2rem;" class="p-1 rounded-circle" />
                        @else
                            <img src="{{ asset('assets/img') }}/{{ $produk->gambar_produk }}" alt="ikon"
                                style="width: 4.2rem; height: 4.2rem;" class="p-1 rounded-circle" />
                        @endif
                    </div>
                    <div class="col d-flex flex-column flex-md-row justify-content-between">
                        <span class="fw-bolder py-1">{{ $produk->nama_produk ?? 'Data Kosong' }}</span>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('order.order', $produk->id) }}">
                                <button class="btn fw-bold rounded-3 btn-warning" id="desc-toggle">
                                    Order
                                </button>
                            </a>
                            <a
                                href="https://wa.me/+6281397575460?text=Halo admin SOC Clean Lampung, Saya {{ auth()->user()->nama }}">
                                <button class="btn fw-bold rounded-3 btn-success" id="Chat">
                                    Chat
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection
