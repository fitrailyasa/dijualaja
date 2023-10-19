@extends('layouts.client.app')

@section('title', 'Detail Order')

@section('content')

    <body class="" style="background-color: #24A384;">
        <div class="vh-100">
            @if (auth()->user()->roles_id == 3)
                <section class="nav-section py-3 px-4 d-flex align-items-center gap-1" style="font-size: 20px;">
                    <a href="{{ route('customer.m-order.index') }}" style="color:#E2DFEB;">
                        <i class="fa-solid fa-arrow-left font-weight-bolder"></i>
                        <span class="fw-bolder px-2">Detail Transaksi</span>
                    </a>
                </section>
            @endif
            <section class="px-4 pb-5">
                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="fw-bold text-md text-white d-flex w-75 align-items-center">
                        <span class="pe-2">Status Order :</span>
                        <span class="text-xl">{{ $order->status_order }}</span>
                    </div>
                </div>

                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md text-white" for="token">ID Transaksi</label>
                    </div>
                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text" name="token"
                        id="token" value="{{ $order->token }}" disabled>
                </div>

                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md text-white" for="user_order">Nama</label>
                    </div>
                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text" name="user_order"
                        id="user_order" value="{{ auth()->user()->nama }}" disabled>
                </div>

                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md text-white" for="waktu_order">Tanggal Order</label>
                    </div>
                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text"
                        name="waktu_order" id="waktu_order" value="{{ $order->waktu_order }}" disabled>
                </div>

                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md text-white" for="no_telepon">Nomor Whatsapp</label>
                    </div>
                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text" name="no_telepon"
                        id="no_telepon" value="{{ auth()->user()->no_telepon }}" disabled>
                </div>

                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md text-white" for="alamat_order">Alamat</label>
                    </div>
                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text"
                        name="alamat_order" id="alamat_order" value="{{ $order->alamat_order }}" disabled>
                </div>

                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md text-white" for="jenis_kategori">Jenis kategori</label>
                    </div>
                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text"
                        name="jenis_kategori" id="jenis_kategori" value="{{ $order->jenis_kategori }}" disabled>
                </div>

                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md text-white" for="harga_order">Harga</label>
                    </div>
                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="number"
                        name="harga_order" id="harga_order" value="{{ $order->harga_order }}" disabled>
                </div>

                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md text-white" for="keluhan">Keluhan</label>
                    </div>
                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text" name="keluhan"
                        id="keluhan" value="{{ $order->keluhan }}" disabled>
                </div>

                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md text-white" for="pembayaran">Pembayaran</label>
                    </div>
                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text" name="pembayaran"
                        id="pembayaran" value="{{ $detail->pembayaran }}" disabled>
                </div>

                <div class="d-flex flex-row w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex flex-column w-75 align-items-center">
                        <label class="fw-bold text-md text-white" for="foto_keluhan">Foto Keluhan</label>
                        <a href="{{ asset('assets/img/keluhan') }}/{{ $detail->foto_keluhan }}">
                            <img src="{{ asset('assets/img/keluhan') }}/{{ $detail->foto_keluhan }}"
                                class="border-0 rounded-3 py-2 px-3 bg-white" style="width: 8.2rem; height: 8.2rem;"
                                name="foto_keluhan" id="foto_keluhan">
                        </a>
                    </div>
                    <div class="d-flex flex-column w-75 align-items-center">
                        <label class="fw-bold text-md text-white" for="foto_pembayaran">Foto Pembayaran</label>
                        <a href="{{ asset('assets/img/pembayaran') }}/{{ $detail->foto_pembayaran }}">
                            <img src="{{ asset('assets/img/pembayaran') }}/{{ $detail->foto_pembayaran }}"
                                class="border-0 rounded-3 py-2 px-3 bg-white" style="width: 8.2rem; height: 8.2rem;"
                                name="foto_pembayaran" id="foto_pembayaran">
                        </a>
                    </div>
                </div>


                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md text-white" for="opsi_pengiriman">Opsi Pengiriman</label>
                    </div>
                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text"
                        name="opsi_pengiriman" id="opsi_pengiriman" value="{{ $detail->opsi_pengiriman }}" disabled>
                </div>

                <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md text-white" for="no_rekening">No. Rekening (optional)</label>
                    </div>
                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text"
                        name="no_rekening" id="no_rekening" value="{{ $detail->no_rekening }}" disabled>
                </div>

            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>

    </body>
@endsection
