<footer class="px-3 py-2 d-block d-lg-none border-top text-white mt-3 fixed-bottom" style="background-color: #117b46">
    <div class="container">
        <div class="d-flex">
            <ul class="nav col-12 align-items-center justify-content-between">
                <li><a href="{{ route('dashboard') }}" class="nav-link px-2 text-white fw-bold"><i
                            class="fa-solid fa-house fs-4"></i></a></li>
                <li>
                    @if (auth()->user()->roles_id == 1)
                        <a href="{{ route('admin.produk.index') }}" class="nav-link px-2 text-white fw-bold"><i
                                class="fa-solid fa-box fs-4"></i></a>
                    @elseif (auth()->user()->roles_id == 2)
                        <a href="{{ route('seller.produk.index') }}" class="nav-link px-2 text-white fw-bold"><i
                                class="fa-solid fa-box fs-4"></i></a>
                    @elseif (auth()->user()->roles_id == 3)
                        <a href="{{ route('produk.index') }}" class="nav-link px-2 text-white fw-bold"><i
                                class="fa-solid fa-box fs-4"></i></a>
                    @endif
                </li>
                <li>
                    @if (auth()->user()->roles_id == 1)
                        <a href="{{ route('admin.kategori.index') }}" class="nav-link px-2 text-white fw-bold"><i
                                class="fa-solid fa-tag fs-4"></i></a>
                    @elseif (auth()->user()->roles_id == 2)
                        <a href="{{ route('seller.kategori.index') }}" class="nav-link px-2 text-white fw-bold"><i
                                class="fa-solid fa-tag fs-4"></i></a>
                    @elseif (auth()->user()->roles_id == 3)
                        <a href="{{ route('kategori.index') }}" class="nav-link px-2 text-white fw-bold"><i
                                class="fa-solid fa-tag fs-4"></i></a>
                    @endif
                </li>
                <li><a href="{{ route('profile.edit', auth()->user()->id) }}"
                        class="nav-link px-2 text-white fw-bold"><i class="fa-solid fa-user fs-4"></i></a>
                </li>
            </ul>
        </div>
    </div>
</footer>
