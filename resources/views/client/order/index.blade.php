@extends('layouts.client.app')

@section('title', 'Transaksi')

@section('backlink')
    @if (auth()->user()->roles_id == 1)
        <a href="{{ route('admin.transaksi.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @elseif (auth()->user()->roles_id == 2)
        <a href="{{ route('seller.transaksi.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @elseif (auth()->user()->roles_id == 2)
        <a href="{{ route('dashboard') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @endif
@endsection

@section('content')
    <div class="container pt-5 mt-5">
        <section class="row d-flex justify-content-center">
            <p class="row justify-content-center">
                Menampilkan semua riwayat transaksi
            </p>
            <hr class="row w-75" style="background-color: rgb(48, 48, 48);; color: #fff; height: 3px;">
        </section>

        <section id="listorders" class="w-100 d-flex flex-column justify-content-center align-items-center"
            style="padding-bottom: 15vh;">
            <input class="my-3 w-75 form-control" type="text" id="myInput" onkeyup="search()" placeholder="Search...">
            @foreach ($orders->where('user_id') as $transaksi)
                <div id="kartu-{{ $transaksi->id }}" class="card p-2 rounded-3 bg-success"
                    style="border: 0.5px solid rgb(0, 119, 47); width: 75%; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
                    <div class="d-flex mb-3">
                        <div class="d-flex justify-content-center align-content-center">
                            <i class="fa-regular fa-file-lines p-3" style="font-size: 2rem;"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center  overflow-hidden">
                            <p class="text-md fw-bolder">Pesanan #{{ $transaksi->user_order }}</p>
                            <div class="d-flex">
                                <span class="text-md">
                                    {{ $transaksi->jumlah_order ?? 'Data Kosong' }}
                                </span>
                                <span class="text-md px-2">
                                    {{ Str::limit($transaksi->pesan_order, 20) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr class="col mt-0" style="background-color: white; color: #3d3c42; height: 3px;">
                    <div class="d-flex px-2 flex-row justify-content-between align-items-center">
                        <span class="">{{ $transaksi->status_order }}</span>
                        @if (auth()->user()->roles_id == 1)
                            <a href="{{ route('admin.transaksi.edit', $transaksi->id) }}" class="text-decoration-none">
                                <button class="btn border border-3 text-white">Detail</button>
                            </a>
                        @elseif (auth()->user()->roles_id == 2)
                            <a href="{{ route('seller.transaksi.edit', $transaksi->id) }}" class="text-decoration-none">
                                <button class="btn border border-3 text-white">Detail</button>
                            </a>
                        @elseif (auth()->user()->roles_id == 3)
                            <a href="{{ route('order.show', $transaksi->id) }}" class="text-decoration-none">
                                <button class="btn border border-3 text-white">Detail</button>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection

@section('script')
    <script>
        function search() {
            // mendapatkan inputan pencarian
            var input, filter, listorders, kartu, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            listorders = document.getElementById("listorders");
            kartu = listorders.getElementsByClassName("card");

            // melakukan iterasi pada setiap kartu
            for (i = 0; i < kartu.length; i++) {
                txtValue = kartu[i].textContent || kartu[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    // jika sesuai dengan pencarian, hapus class visually-hidden
                    kartu[i].classList.remove("visually-hidden");
                } else {
                    // jika tidak sesuai dengan pencarian, tambahkan class visually-hidden
                    kartu[i].classList.add("visually-hidden");
                }
            }
        }
    </script>
    </div>
@endsection
