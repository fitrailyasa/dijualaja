@extends('layouts.client.app')

@section('title', 'Dashboard')

@section('content')

    <section class="px-3 my-5 py-2">
        <div class="row mt-5 mb-3">
            @php $count = 0; @endphp
            @foreach ($produks as $produk)
                @if ($count < 18)
                    <div class="col-xl-2 col-md-6 col-6 mb-3">
                        <div class="card text-start rounded-4">
                            <div class="text-center p-2">
                                @if ($produk->gambar_produk)
                                    <img height="100" class=""
                                        src="{{ asset('assets/img') }}/{{ $produk->gambar_produk }}"
                                        alt="{{ $produk->nama_produk }}">
                                @else
                                    <img height="100" class="" src="{{ asset('assets/img/default.png') }}"
                                        alt="{{ $produk->nama_produk }}">
                                @endif
                            </div>
                            <div class="p-3 border-top">
                                <h4 class="card-title">{{ $produk->nama_produk }}</h4>
                                {{-- <p class="card-text">{{ \Illuminate\Support\Str::limit($produk->deskripsi_produk, 50) }}</p> --}}
                                <p class="card-text fw-bold">Rp. {{ $produk->harga_produk }}</p>
                                <a class="btn btn-sm btn-primary" href="{{ route('order.order', $produk->id) }}">Detail</a>
                            </div>
                        </div>
                    </div>
                    @php $count++; @endphp
                @endif
            @endforeach
        </div>
    </section>

@endsection
