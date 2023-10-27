@extends('layouts.admin.app')

@section('title', 'Transaksi')

@section('content')

    <div class="col-lg-12 col-lg-12 form-wrapper" id="Transaksi">
        @if (auth()->user()->roles_id == 1)
            <form method="POST" action="{{ route('super.transaksi.store') }}" enctype='multipart/form-data'>
            @elseif(auth()->user()->roles_id == 2)
                <form method="POST" action="{{ route('admin.transaksi.store') }}" enctype='multipart/form-data'>
        @endif
        @csrf
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">
                    <b>Transaksi</b>
                </h4>
            </div>
            <div class="card-body p-3 mb-2 bg-secondary text-white">
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Nama :
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="user" id="user"
                            value="{{ auth()->user()->nama }}" disabled />
                        <input type="hidden" name="user_order" id="user_order" value={{ auth()->user()->nama }}>
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Jenis Transaksi :
                    </label>
                    <div class="col-sm-9">
                        <select class="col-sm-12 col-form-label rounded-2" name="jenis_transaksi" id="jenis_transaksi"
                            value="" required enabled>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Deskripsi :
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('pesan_order') is-invalid @enderror"
                            name="pesan_order" id="pesan_order" required enabled />
                        @error('pesan_order')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Tanggal :
                    </label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control" name="jumlah_order" id="jumlah_order" required
                            enabled />
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Total : </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('harga_order') is-invalid @enderror"
                            name="harga_order" id="harga_order" placeholder="10000" required enabled />
                        @error('harga_order')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark btn-sm mb-3 ml-1 mt-1 p-1">
                Simpan
            </button>
            <button type="reset" class="btn btn-dark btn-sm mb-3 ml-1 mt-1 p-1">
                Batal
            </button>
        </div>
        </form>
    </div>
    @include('admin.menu')
@endsection
