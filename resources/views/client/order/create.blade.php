@extends('layouts.client.app')

@section('title', 'Order')

@section('content')

    <body class="" style="background-color: #24A384;">
        <div class="vh-100">
            <section class="nav-section py-3 px-4 d-flex align-items-center gap-1" style="font-size: 20px;">
                <a href="/member/m-kategori" class="bg-opacity-10 btn" style="color: #E2DFEB;font-size: 1.2rem;">
                    <i class="fa-solid fa-arrow-left font-weight-bolder"></i>
                    <span class="fw-bolder px-2">Order</span>
                </a>
            </section>
            <section class="px-4">
                <div class="col-lg-12 col-lg-12 form-wrapper" id="detail-produk">
                    <form action="">
                        <div class="">
                            <div class="p-3 mb-2 text-white">
                                @csrf
                                <div class="d-flex justify-content-center m-4">
                                    <label for="gambar_produk">
                                        @if ($order->gambar_produk == null)
                                            <img src="{{ asset('assets/img') }}/default.png"
                                                style="width:200px !important; height:200px !important;"
                                                class="img-circle elevation-2" alt="">
                                        @else
                                            <img src="{{ asset('assets/img') }}/{{ $order->gambar_produk }}"
                                                style="width:200px !important; height:200px !important;"
                                                class="img-circle elevation-2" alt="">
                                        @endif
                                        <input type="file" class="visually-hidden" placeholder="gambar_produk"
                                            name="gambar_produk" id="gambar_produk" disabled>
                                    </label>
                                </div>
                                <div class="mb-2 pb-2 row">
                                    <label class="col-sm-3 col-form-label">Nama Jenis kategori:
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('nama_produk') is-invalid @enderror"
                                            name="nama_produk" id="nama_produk" value="{{ $order->nama_produk }}" required
                                            disabled />
                                        @error('nama_produk')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 pb-2 row">
                                    <label class="col-sm-3 col-form-label">Deskripsi : </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control @error('deskripsi_produk') is-invalid @enderror" name="deskripsi_produk"
                                            id="deskripsi_produk" required disabled>{{ $order->deskripsi_produk }}</textarea>
                                        @error('deskripsi_produk')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 pb-2 row">
                                    <label class="col-sm-3 col-form-label">Estimasi Waktu :
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('stok_produk') is-invalid @enderror"
                                            name="stok_produk" id="stok_produk" value="{{ $order->stok_produk }} hari"
                                            required disabled />
                                        @error('stok_produk')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 pb-2 row">
                                    <label class="col-sm-3 col-form-label">Harga : </label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('harga_produk') is-invalid @enderror"
                                            name="harga_produk" id="harga_produk" value="{{ $order->harga_produk }}"
                                            required disabled />
                                        @error('harga_produk')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- Modal -->
                <div class="modal fade show" id="exampleModalFullscreen" tabindex="-1"
                    aria-labelledby="exampleModalFullscreenLabel" aria-modal="false" role="dialog">
                    <div class="modal-dialog modal-fullscreen pb-4">
                        <div class="modal-content overflow-auto pb-4" style="background-color: #24A384;">
                            <div class="d-flex px-3 pt-4">
                                <button type="button" class="border-0" data-bs-dismiss="modal" aria-label="Close"
                                    style="background-color: #24A384; color: #E2DFEB; font-size: 20px;">
                                    <i class="fa-solid fa-arrow-left font-weight-bolder"></i>
                                </button>
                                <span class="font-weight-bolder px-2" style="color: #E2DFEB; font-size: 20px;">Order</span>
                            </div>

                            <form action="{{ route('customer.m-order.store') }}" method="POST"
                                enctype="multipart/form-data"
                                class="py-3 d-flex flex-column gap-3 justify-content-center align-items-center w-100">
                                @csrf
                                <div class="d-flex justify-content-center gap-3 align-items-center flex-column w-100">
                                    <div class="bg-transparent p-3" style="width: 80%">
                                        <div class="d-flex flex-column w-100">
                                            <div class="d-flex w-100">
                                                <label class="fw-bold text-md text-white mb-0 mt-2"
                                                    for="user_order">Nama</label>
                                            </div>
                                            <input type="hidden" name="list_id" value="{{ $order->id }}">
                                            <input class="border-0 rounded-3 py-2 px-3 w-100 text-white text-lg fw-normal"
                                                type="text" name="user_order" required id="user_order"
                                                value="{{ auth()->user()->nama }}" disabled>
                                            <input type="hidden" name="user_order" value="{{ auth()->user()->nama }}">
                                        </div>

                                        <div class="d-flex flex-column w-100 align-items-center">
                                            <div class="d-flex w-100">
                                                <label class="fw-bold text-md text-white mb-0 mt-2" for="no_telepon">Nomor
                                                    Whatsapp</label>
                                            </div>
                                            <input class="border-0 rounded-3 py-2 px-3 w-100 text-white text-lg fw-normal"
                                                type="text" name="no_telepon" required id="no_telepon"
                                                value="{{ auth()->user()->no_telepon }}" disabled>
                                            <input type="hidden" name="no_telepon"
                                                value="{{ auth()->user()->no_telepon }}">
                                        </div>

                                        <div class="d-flex flex-column w-100 align-items-center">
                                            <div class="d-flex w-100">
                                                <label class="fw-bold text-md text-white mb-0 mt-2"
                                                    for="jenis_kategori">Jenis kategori</label>
                                            </div>
                                            <input class="border-0 rounded-3 py-2 px-3 w-100 text-white text-lg fw-normal"
                                                type="text" name="jenis_kategori" required id="jenis_kategori"
                                                value="{{ $order->nama_produk }}" disabled>
                                            <input type="hidden" name="jenis_kategori"
                                                value="{{ $order->nama_produk }}">
                                        </div>

                                        <div class="d-flex flex-column w-100 align-items-center">
                                            <div class="d-flex w-100">
                                                <label class="fw-bold text-md text-white mb-0 mt-2"
                                                    for="harga_order">Estimasi Waktu</label>
                                            </div>
                                            <input
                                                class="border-0 rounded-3 py-2 px-3 w-100 text-white text-lg fw-normal @error('harga_order') is-invalid @enderror"
                                                type="text" name="harga_order" required id="harga_order"
                                                value="{{ $order->stok_produk }} hari" disabled>
                                            @error('harga_order')
                                                <span class="invalid-feedback text-center" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="d-flex flex-column w-100 align-items-center">
                                            <div class="d-flex w-100">
                                                <label class="fw-bold text-md text-white mb-0 mt-2"
                                                    for="harga_order">Harga</label>
                                            </div>
                                            <input class="border-0 rounded-3 py-2 px-3 w-100 text-white text-lg fw-normal"
                                                type="number" name="harga_order" required id="harga_order"
                                                value="{{ $order->harga_produk }}" disabled>
                                            <input type="hidden" name="harga_order" value="{{ $order->harga_produk }}">
                                        </div>

                                        <div class="d-flex flex-column w-100 align-items-center">
                                            <div class="d-flex w-100">
                                                <label class="fw-bold text-md text-white mb-0 mt-2"
                                                    for="waktu_order">Tanggal Order</label>
                                            </div>
                                            <input class="border-0 rounded-3 py-2 px-3 w-100 text-white text-lg fw-normal"
                                                type="text" name="waktu_order" required id="waktu_order"
                                                value="{{ $now }}" disabled>
                                            <input type="hidden" name="waktu_order" value="{{ $now }}">
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column w-100 align-items-center">
                                        <div class="d-flex w-75">
                                            <label class="fw-bold text-md text-white" for="alamat_order">Alamat</label>
                                        </div>
                                        <input
                                            class="border-0 rounded-3 py-2 px-3 w-75 @error('alamat_order') is-invalid @enderror"
                                            type="text" name="alamat_order" required id="alamat_order"
                                            placeholder="Masukkan alamat anda">
                                        @error('alamat_order')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex flex-column w-100 align-items-center">
                                        <div class="d-flex w-75">
                                            <label class="fw-bold text-md text-white" for="keluhan">Keluhan</label>
                                        </div>
                                        <input
                                            class="border-0 rounded-3 py-2 px-3 w-75 @error('keluhan') is-invalid @enderror"
                                            type="text" name="keluhan" required id="keluhan"
                                            placeholder="Masukkan keluhan anda">
                                        @error('keluhan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex flex-column w-100 align-items-center">
                                        <div class="d-flex w-75">
                                            <label class="fw-bold text-md text-white" for="foto_keluhan">Foto
                                                Keluhan</label>
                                        </div>
                                        <input
                                            class="border-0 rounded-3 py-2 px-3 w-75 bg-white @error('foto_keluhan') is-invalid @enderror"
                                            type="file" name="foto_keluhan" required id="foto_keluhan">
                                        @error('foto_keluhan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex flex-column w-100 align-items-center">
                                        <div class="d-flex w-75">
                                            <label class="fw-bold text-md text-white" for="foto_keluhan">QRIS dan
                                                No.rekening SOC Clean</label>
                                        </div>
                                        <div class="d-flex w-100">
                                            <a href="{{ asset('assets/img') }}/QRIS.jpg"
                                                class="w-50 d-flex justify-content-center align-items-center">
                                                <img src="{{ asset('assets/img') }}/QRIS.jpg"
                                                    class="w-50 align-items-center" alt="">
                                            </a>
                                            <div class="justify-content-center align-items-start d-flex flex-column w-50">
                                                <span class="">BCA: 8905837873</span>
                                                <span class="">a.n muhamad rifai</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group d-flex flex-column justify-content-center w-75">
                                        <label class="fw-bold text-md text-white border-0"
                                            style="background-color: #24A384;" for="pembayaran">Metode Pembayaran</label>
                                        <select class="custom-select border-0 rounded-3 py-2 px-3 w-100" required
                                            id="pembayaran" name="pembayaran">
                                            <option selected value="tunai">Tunai</option>
                                            <option value="QRIS">QRIS</option>
                                            <option value="BCA">Transfer BCA</option>
                                        </select>
                                    </div>

                                    <div class="input-group d-flex flex-column justify-content-center w-75">
                                        <label class="fw-bold text-md text-white border-0"
                                            style="background-color: #24A384;" for="opsi_pengiriman">Opsi
                                            Pengiriman</label>
                                        <select class="custom-select border-0 rounded-3 py-2 px-3 w-100" required
                                            id="opsi_pengiriman" name="opsi_pengiriman">
                                            <option selected value="kunjungi toko">Kunjungi Toko</option>
                                            <option value="antar jemput">Antar Jemput</option>
                                        </select>
                                    </div>

                                    <div class="d-flex flex-column w-100 align-items-center">
                                        <div class="d-flex w-75">
                                            <label class="fw-bold text-md text-white" for="no_rekening">No. Rekening
                                                (optional)</label>
                                        </div>
                                        <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white" type="text"
                                            name="no_rekening" id="no_rekening" placeholder="Masukkan no.rekening anda">
                                        @error('no_rekening')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex flex-column w-100 align-items-center">
                                        <div class="d-flex w-75">
                                            <label class="fw-bold text-md text-white" for="foto_pembayaran">Bukti
                                                Pembayaran</label>
                                        </div>
                                        <input
                                            class="border-0 rounded-3 py-2 px-3 w-75 bg-white @error('foto_pembayaran') is-invalid @enderror"
                                            type="file" name="foto_pembayaran" id="foto_pembayaran">
                                        @error('foto_pembayaran')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <input type="hidden" name="jenis_transaksi" value="pemasukan">

                                    <button type="submit" class="btn w-25 mt-2"
                                        style="background-color: #D6C37E;">Order</button>
                                </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="pb-5 d-flex justify-content-center align-items-center w-100">
                    <button data-bs-target="#exampleModalFullscreen" data-bs-toggle="modal" data-bs-dismiss="modal"
                        class="btn w-50 mt-4" style="background-color: #D6C37E;">Pesan kategori</button>
                </div>
            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>

    </body>
@endsection
