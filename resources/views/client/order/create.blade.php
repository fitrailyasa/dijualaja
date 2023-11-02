@extends('layouts.client.app')

@section('title', 'Order')

@section('content')

    <div class="pt-5 mt-3">
        <section class="px-4">
            <div class="col-lg-12 col-lg-12 form-wrapper" id="detail-produk">
                <div class="">
                    <div class="p-3 text-white">
                        @csrf
                        <div class="d-flex justify-content-center m-4">
                            <label for="gambar_produk">
                                @if ($order->gambar_produk == null)
                                    <img src="{{ asset('assets/img') }}/default.png"
                                        style="width:200px !important; height:200px !important;"
                                        class="img-circle elevation-2 bg-white" alt="">
                                @else
                                    <img src="{{ asset('assets/img') }}/{{ $order->gambar_produk }}"
                                        style="width:200px !important; height:200px !important;"
                                        class="img-circle elevation-2 bg-white" alt="">
                                @endif
                                <input type="file" class="visually-hidden" placeholder="gambar_produk"
                                    name="gambar_produk" id="gambar_produk" disabled>
                            </label>
                        </div>
                        <div class="mb-2 pb-2 row">
                            <label class="col-sm-3 col-form-label">Nama Produk:
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
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
                            <label class="col-sm-3 col-form-label">Stok:
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('stok_produk') is-invalid @enderror"
                                    name="stok_produk" id="stok_produk" value="{{ $order->stok_produk }}" required
                                    disabled />
                                @error('stok_produk')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2 pb-2 row">
                            <label class="col-sm-3 col-form-label">Harga : </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('harga_produk') is-invalid @enderror"
                                    name="harga_produk" id="harga_produk" value="{{ $order->harga_produk }}" required
                                    disabled />
                                @error('harga_produk')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade show" id="exampleModalFullscreen" tabindex="-1"
                aria-labelledby="exampleModalFullscreenLabel" aria-modal="false" role="dialog">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content overflow-auto pb-4 bg-success">
                        <div class="d-flex px-3 pt-4">
                            <button type="button" class="border-0" data-bs-dismiss="modal" aria-label="Close"
                                style=" font-size: 20px;">
                                <i class="fa fa-close font-weight-bolder"></i>
                            </button>
                            <span class="font-weight-bolder px-2" style="color: #E2DFEB; font-size: 20px;">Order</span>
                        </div>

                        <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data"
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
                                                for="produk">Produk</label>
                                        </div>
                                        <input class="border-0 rounded-3 py-2 px-3 w-100 text-white text-lg fw-normal"
                                            type="text" name="produk" required id="produk"
                                            value="{{ $order->nama_produk }}" disabled>
                                        <input type="hidden" name="produk" value="{{ $order->nama_produk }}">
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
                                                for="tanggal_order">Tanggal
                                                Order</label>
                                        </div>
                                        <input class="border-0 rounded-3 py-2 px-3 w-100 text-white text-lg fw-normal"
                                            type="text" name="tanggal_order" required id="tanggal_order"
                                            value="{{ $now }}" disabled>
                                        <input type="hidden" name="tanggal_order" value="{{ $now }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-column w-100 align-items-center">
                                    <div class="d-flex w-75">
                                        <label class="fw-bold text-md text-white" for="jumlah_order">Jumlah Order</label>
                                    </div>
                                    <input
                                        class="border-0 rounded-3 py-2 px-3 w-75 @error('jumlah_order') is-invalid @enderror"
                                        type="text" name="jumlah_order" required id="jumlah_order"
                                        placeholder="Masukkan alamat anda">
                                    @error('jumlah_order')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
                                        <label class="fw-bold text-md text-white" for="pesan_order">Catatan</label>
                                    </div>
                                    <input
                                        class="border-0 rounded-3 py-2 px-3 w-75 @error('pesan_order') is-invalid @enderror"
                                        type="text" name="pesan_order" required id="pesan_order"
                                        placeholder="Masukkan catatan order">
                                    @error('pesan_order')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column w-100 align-items-center">
                                    <div class="d-flex w-75">
                                        <label class="fw-bold text-md text-white" for="foto_pesan_order">QRIS dan
                                            No.rekening Dijualaja</label>
                                    </div>
                                    <div class="d-flex w-100">
                                        <a href="{{ asset('assets/img') }}/QRIS.jpg"
                                            class="w-50 d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img') }}/QRIS.jpg" class="w-50 align-items-center"
                                                alt="">
                                        </a>
                                        <div class="justify-content-center align-items-start d-flex flex-column w-50">
                                            <span class="">BCA: 13863475</span>
                                            <span class="">a.n Penjual Keren</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group d-flex flex-column justify-content-center w-75">
                                    <label class="fw-bold text-md text-white border-0" for="pembayaran">Metode
                                        Pembayaran</label>
                                    <select class="custom-select border-0 rounded-3 py-2 px-3 w-100" required
                                        id="pembayaran" name="pembayaran">
                                        <option selected value="Tunai">Tunai</option>
                                        <option value="QRIS">QRIS</option>
                                        <option value="BCA">Transfer BCA</option>
                                    </select>
                                </div>

                                <div class="input-group d-flex flex-column justify-content-center w-75">
                                    <label class="fw-bold text-md text-white border-0" for="opsi_pengiriman">Opsi
                                        Pengiriman</label>
                                    <select class="custom-select border-0 rounded-3 py-2 px-3 w-100" required
                                        id="opsi_pengiriman" name="opsi_pengiriman">
                                        <option selected value="Kunjungi Toko">Kunjungi Toko</option>
                                        <option value="Antar Jemput">Antar Jemput</option>
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

                                <button type="submit" class="btn w-25 mt-2 bg-primary">Checkout</button>
                            </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="px-4 pb-5 text-right">
                <button data-bs-target="#exampleModalFullscreen" data-bs-toggle="modal" data-bs-dismiss="modal"
                    class="btn mb-4 bg-primary">Pesan Produk</button>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

@endsection
