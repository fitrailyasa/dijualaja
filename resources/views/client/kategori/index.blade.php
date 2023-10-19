@extends('layouts.client.app')

@section('title', 'kategori')

@section('content')

    <div class="vh-100" style="background-color: #24A384;">
        <section class="nav-section py-3 px-4 d-flex align-items-center gap-1" style="font-size: 20px;">
            <a href="{{ route('customer.kategori.index') }}" style="color:#E2DFEB;"><i
                    class="fa-solid fa-arrow-left font-weight-bolder text-white"></i>
                <span class="fw-bolder px-2" style="color: #E2DFEB;">Service kategori</span>
            </a>
        </section>
        <section class="px-4 body-section d-flex flex-column gap-3 pt-3" style="padding-bottom: 100px">
            @foreach ($kategoris as $kategori)
                <a href="{{ route('customer.kategori.show', $kategori->id) }}"
                    class="d-flex align-items-center bg-white rounded-4 px-4 py-2 ">
                    <div class="d-flex">
                        @if ($kategori->gambar_kategori == null)
                            <img src="{{ asset('assets/img') }}/default.png" alt="ikon"
                                style="width: 4.2rem; height: 4.2rem;" class="p-1 rounded-circle" />
                        @else
                            <img src="{{ asset('assets/img') }}/{{ $kategori->gambar_kategori }}" alt="ikon"
                                style="width: 4.2rem; height: 4.2rem;" class="p-1 rounded-circle" />
                        @endif
                    </div>
                    <div class="col d-flex flex-column justify-content-between">
                        <span class="fw-bolder py-1">{{ $kategori->nama_kategori }}</span>
                        <div class="font-weight-normal text-black">
                            <span>{{ $kategori->deskripsi_kategori }}</span>
                        </div>
                    </div>
                </a>

                {{-- <section class="row d-flex justify-content-center gap-3 px-4 pt-5">
        <a href="{{ route('customer.m-kategori.show',$kategori->id) }}" class="d-flex align-items-center gap-4 bg-white ps-4 text-decoration-none font-weight-bolder text-black rounded-4">
            @if ($kategori->gambar_kategori == null)
                <img src="{{ asset('assets/img') }}/default.png" alt="ikon" style="width: 4.2rem; height: 4.2rem;" class="p-1"/>
            @else
                <img src="{{ asset('assets/img') }}/{{ $kategori->gambar_kategori }}" alt="ikon" style="width: 4.2rem; height: 4.2rem;" class="p-1"/>
            @endif
            <span>{{ $kategori->nama_kategori }}</span>
        </a>
    </section> --}}
            @endforeach
        </section>
    </div>

@endsection

@include('menu')
