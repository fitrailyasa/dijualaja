@extends('layouts.admin.app')

@section('title', 'Konfirmasi Order')

@section('backlink')
    @if (auth()->user()->roles_id == 1)
        <a href="{{ route('admin.transaksi.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @elseif (auth()->user()->roles_id == 2)
        <a href="{{ route('seller.transaksi.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @endif
@endsection

@section('content')

    <div class="">
        <div class="input-group d-flex flex-column w-100 align-items-center pt-3 pb-0">
            <a
                href="https://wa.me/+62{{ $order->no_telepon }}?text=Halo saya {{ $order->user_order }} mengkonfirmasi pesanan">
                <button class="btn fw-bold rounded-3 btn-success" style="text-align: center;" id="Chat">
                    Chat User
                    <i class="fa-brands fa-whatsapp font-weight-bolder"></i>
                </button>
            </a>
        </div>
        <section class="px-4 pb-5">
            @if (auth()->user()->roles_id == 1)
                <form action="{{ route('admin.transaksi.update', $order->id) ?? 'Data Kosong' }}" method="POST">
                @elseif (auth()->user()->roles_id == 2)
                    <form action="{{ route('seller.transaksi.update', $order->id) ?? 'Data Kosong' }}" method="POST">
            @endif
            @csrf
            @method('PUT')
            <div class="input-group d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="status_order">Status</label>
                </div>
                <select class="custom-select d-flex w-75 rounded-3" id="status_order" name="status_order" enabled>
                    <option hidden selected value="{{ $order->status_order ?? 'Data Kosong' }}">
                        {{ $order->status_order }}
                    </option>
                    <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
                    <option value="Dikonfirmasi">Dikonfirmasi</option>
                    <option value="Sedang Dikemas">Sedang Dikemas</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
            <div class="d-flex justify-content-center w-100 py-4">
                <button class="btn btn-primary w-50" type="submit">Update Status</button>
            </div>
            </form>
            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="token">No Order</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75 @error('token') is-invalid @enderror" type="text"
                    name="token" id="token" value="{{ $order->token ?? 'Data Kosong' }}" disabled>
                @error('token')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="user_order">Nama</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75 @error('user_order') is-invalid @enderror" type="text"
                    name="user_order" id="user_order" value="{{ $order->user_order ?? 'Data Kosong' }}" disabled>
                @error('user_order')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="jumlah_order">Tanggal Order</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75 @error('jumlah_order') is-invalid @enderror" type="text"
                    name="jumlah_order" id="jumlah_order" value="{{ $order->jumlah_order ?? 'Data Kosong' }}" disabled>
                @error('jumlah_order')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="no_telepon">Nomor Whatsapp</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75 @error('no_telepon') is-invalid @enderror" type="text"
                    name="no_telepon" id="no_telepon" value="{{ $order->no_telepon ?? 'Data Kosong' }}" disabled>
                @error('no_telepon')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="alamat_order">Alamat</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75" type="text" name="alamat_order" id="alamat_order"
                    value="{{ $order->alamat_order ?? 'Data Kosong' }}" disabled>
                @error('alamat_order')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="produk">Produk</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75 @error('produk') is-invalid @enderror" type="text"
                    name="produk" id="produk" value="{{ $order->produk ?? 'Data Kosong' }}" disabled>
                @error('produk')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="harga_order">Harga</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75 @error('harga_order') is-invalid @enderror" type="number"
                    name="harga_order" id="harga_order" value="{{ $order->harga_order ?? 'Data Kosong' }}" disabled>
                @error('harga_order')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="pesan_order">Pesan dari order</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75" type="text" name="pesan_order" id="pesan_order"
                    value="{{ $order->pesan_order ?? 'Data Kosong' }}" disabled>
                @error('pesan_order')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="pembayaran">Pembayaran</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75" type="text" name="pembayaran" id="pembayaran"
                    value="{{ $detail->pembayaran ?? 'Data Kosong' }}" disabled>
                @error('pembayaran')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-row w-100 align-items-center pt-3 pb-0">
                <div class="d-flex flex-column w-100 align-items-center">
                    <label class="fw-bold text-md" for="foto_pembayaran">Foto Pembayaran</label>
                    <a href="{{ asset('assets/img/pembayaran') }}/{{ $detail->foto_pembayaran ?? 'Data Kosong' }}">
                        <img src="{{ asset('assets/img/pembayaran') }}/{{ $detail->foto_pembayaran ?? 'Data Kosong' }}"
                            class="border-0 rounded-3 py-2 px-3 bg-success" style="width: 8.2rem; height: 8.2rem;"
                            name="foto_pembayaran" id="foto_pembayaran">
                    </a>
                    <a href="{{ asset('assets/img/pembayaran') }}/{{ $detail->foto_pembayaran ?? 'Data Kosong' }}"
                        class="btn btn-primary m-2">Lihat</a>
                </div>
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="opsi_pengiriman">Opsi Pengiriman</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75 @error('opsi_pengiriman') is-invalid @enderror"
                    type="text" name="opsi_pengiriman" id="opsi_pengiriman"
                    value="{{ $detail->opsi_pengiriman ?? 'Data Kosong' }}" disabled>
                @error('opsi_pengiriman')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-5 mb-5">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="no_rekening">No. Rekening (optional)</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75 @error('no_rekening') is-invalid @enderror" type="text"
                    name="no_rekening" id="no_rekening" value="{{ $detail->no_rekening ?? 'Data Kosong' }}" disabled>
                @error('no_rekening')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

@endsection
