<!-- Sidebar Menu -->
@if (auth()->user()->roles_id == 1)
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('beranda') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Beranda
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Data User
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelola Data User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.create') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Data User</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="nav-icon fas fa-box"></i>
                    <p>
                        Data Produk
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.produk.index') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelola Data Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.produk.create') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Data Produk</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="nav-icon fas fa-tag"></i>
                    <p>
                        Data Kategori
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.kategori.index') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelola Data Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.kategori.create') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Data Kategori</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.transaksi.index') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-history"></i>
                    <p>
                        Riwayat Transaksi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                    @csrf
                </form>
                <a href="#" class="nav-link text-white"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@elseif (auth()->user()->roles_id == 2)
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('beranda') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Beranda
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="nav-icon fas fa-box"></i>
                    <p>
                        Data Produk
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('seller.produk.index') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelola Data Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('seller.produk.create') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Data Produk</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="nav-icon fas fa-tag"></i>
                    <p>
                        Data Kategori
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('seller.kategori.index') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelola Data Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('seller.kategori.create') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Data Kategori</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('seller.transaksi.index') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-history"></i>
                    <p>
                        Riwayat Transaksi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                    @csrf
                </form>
                <a href="#" class="nav-link text-white"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@elseif (auth()->user()->roles_id == 3)
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Beranda
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('produk.index') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-box"></i>
                    <p>
                        Produk
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-tag"></i>
                    <p>
                        Kategori
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('order.index') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-history"></i>
                    <p>
                        Riwayat Transaksi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                    @csrf
                </form>
                <a href="#" class="nav-link text-white"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@endif

<!-- /.sidebar-menu -->
