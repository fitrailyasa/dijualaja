<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <script src="https://kit.fontawesome.com/2a99f4df77.js" crossorigin="anonymous"></script>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body class="hold-transition sidebar-mini layout-fixed bg-success bg-gradient">
    <header class="px-3 py-2 border-bottom text-white mb-3 fixed-top" style="background-color: #117b46">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <img class="img-fluid" width="60" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                <div class="d-none d-lg-block">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mx-3 justify-content-center mb-md-0">
                        <li><a href="{{ route('dashboard') }}" class="nav-link px-3 text-white fw-bold fs-5">Home</a>
                        </li>
                        <li><a href="{{ route('produk.index') }}"
                                class="nav-link px-3 text-white fw-bold fs-5">Produk</a></li>
                        <li><a href="{{ route('kategori.index') }}"
                                class="nav-link px-3 text-white fw-bold fs-5">Kategori</a></li>
                    </ul>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ route('order.index') }}" class="nav-link px-2 text-white fw-bold">
                        <i class="fa-solid fa-shopping-cart fs-4"></i>
                    </a>
                    <a href="{{ route('profile.edit', auth()->user()->id) }}"
                        class="ml-4 border rounded-circle nav-link px-2 text-white fw-bold d-none d-lg-block">
                        <i class="fa-solid fa-user fs-4 px-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
