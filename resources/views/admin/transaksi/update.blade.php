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

    <div class="vh-100">
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
            <form action="{{ route('admin.transaksi.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group d-flex flex-column w-100 align-items-center pt-3 pb-0">
                    <div class="d-flex w-75">
                        <label class="fw-bold text-md" for="status_order">Status</label>
                    </div>
                    <select class="custom-select d-flex w-75 rounded-3" id="status_order" name="status_order" enabled>
                        <option hidden selected value="{{ $order->status_order }}">{{ $order->status_order }}</option>
                        <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
                        <option value="Dikonfirmasi">Dikonfirmasi</option>
                        <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                        <option value="Dapat Diambil">Dapat Diambil</option>
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
                    name="token" id="token" value="{{ $order->token }}" disabled>
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
                    name="user_order" id="user_order" value="{{ $order->user_order }}" disabled>
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
                    name="jumlah_order" id="jumlah_order" value="{{ $order->jumlah_order }}" disabled>
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
                    name="no_telepon" id="no_telepon" value="{{ $order->no_telepon }}" disabled>
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
                    value="{{ $order->alamat_order }}" disabled>
                @error('alamat_order')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="jenis_kategori">Jenis kategori</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75 @error('jenis_kategori') is-invalid @enderror"
                    type="text" name="jenis_kategori" id="jenis_kategori" value="{{ $order->jenis_kategori }}" disabled>
                @error('jenis_kategori')
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
                    name="harga_order" id="harga_order" value="{{ $order->harga_order }}" disabled>
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
                    value="{{ $order->pesan_order }}" disabled>
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
                    value="{{ $detail->pembayaran }}" disabled>
                @error('pembayaran')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-row w-100 align-items-center pt-3 pb-0">
                <div class="d-flex flex-column w-75 align-items-center">
                    <label class="fw-bold text-md" for="foto_pesan_order">Foto pesan_order</label>
                    <img src="{{ asset('assets/img/pesan_order') }}/{{ $detail->foto_pesan_order }}"
                        class="border-1 rounded-3 py-2 px-3 bg-white" style="width: 8.2rem; height: 8.2rem;"
                        name="foto_pesan_order" id="foto_pesan_order">
                    @error('foto_pesan_order')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button data-bs-target="#modal_pesan_order" data-bs-toggle="modal" data-bs-dismiss="modal"
                        class="btn btn-primary mt-3">Lihat</button>
                </div>
                <div class="d-flex flex-column w-75 align-items-center">
                    <label class="fw-bold text-md" for="foto_pembayaran">Foto Pembayaran</label>
                    <img src="{{ asset('assets/img/pembayaran') }}/{{ $detail->foto_pembayaran }}"
                        class="border-1 rounded-3 py-2 px-3 bg-white" style="width: 8.2rem; height: 8.2rem;"
                        name="foto_pembayaran" id="foto_pembayaran">
                    @error('foto_pembayaran')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button data-bs-target="#modal_pembayaran" data-bs-toggle="modal" data-bs-dismiss="modal"
                        class="btn btn-primary mt-3">Lihat</button>
                </div>
                <div class="modal fade show" id="modal_pesan_order" tabindex="-1" aria-labelledby="modal_pesan_order"
                    aria-modal="false" role="dialog">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="align-items-start">
                                <button type="button" class="m-4 text-dark btn" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fa-solid fa-arrow-left font-weight-bolder"></i>
                                </button>
                            </div>
                            <img src="{{ asset('assets/img/pesan_order') }}/{{ $detail->foto_pesan_order }}"
                                class="border-1 rounded-3 py-2 px-3 bg-white align-items-center justify-content-center d-flex vh-100"
                                style="object-fit: contain" name="foto_pesan_order" id="foto_pesan_order">
                        </div>
                    </div>
                </div>
                <div class="modal fade show" id="modal_pembayaran" tabindex="-1" aria-labelledby="modal_pembayaran"
                    aria-modal="false" role="dialog">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="align-items-start">
                                <button type="button" class="m-4 text-dark btn" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fa-solid fa-arrow-left font-weight-bolder"></i>
                                </button>
                            </div>
                            <img src="{{ asset('assets/img/pembayaran') }}/{{ $detail->foto_pembayaran }}"
                                class="border-1 rounded-3 py-2 px-3 bg-white align-items-center justify-content-center d-flex vh-100"
                                style="object-fit: contain" name="foto_pesan_order" id="foto_pesan_order">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="opsi_pengiriman">Opsi Pengiriman</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75 @error('opsi_pengiriman') is-invalid @enderror"
                    type="text" name="opsi_pengiriman" id="opsi_pengiriman" value="{{ $detail->opsi_pengiriman }}"
                    disabled>
                @error('opsi_pengiriman')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex flex-column w-100 align-items-center pt-3 pb-0">
                <div class="d-flex w-75">
                    <label class="fw-bold text-md" for="no_rekening">No. Rekening (optional)</label>
                </div>
                <input class="border-1 rounded-3 py-2 px-3 w-75 @error('no_rekening') is-invalid @enderror" type="text"
                    name="no_rekening" id="no_rekening" value="{{ $detail->no_rekening }}" disabled>
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
