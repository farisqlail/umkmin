<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UMKMIN</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('/assets/icon-web.png') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('./users/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./users/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('./users/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./users/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./users/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('./users/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    @if (session()->has('status') && session('status') == 'success')
        <script type='text/javascript'>
            Swal.fire('Selamat Datang Di UMKM.IN')
        </script>
    @endif

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo"><img src="{{ asset('/assets/UMKM.png') }}" alt=""
                    class="img-fluid"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    @auth
                        @if (auth()->user()->role == 'umkm')
                            @if (!empty(auth()->user()->email_verified_at))
                                <li class="nav-item">
                                    <a class="nav-link scrollto" href="/dashboard">UMKM</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link scrollto" href="/">UMKM</a>
                                </li>
                                <script type='text/javascript'>
                                    Swal.fire({
                                        text: 'Anda harus verified email terlebih dahulu!!!',
                                        icon: 'error',
                                    })
                                </script>
                            @endif
                        @elseif (auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link scrollto" href="/manajemen/categories">Admin</a>
                            </li>
                        @endif
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link scrollto"href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="/about">Tentang Kami</a>
                    </li>
                    @auth
                        <form action="/keluar" method="post">
                            @csrf
                            <li class="nav-item">
                                <a class="" style="text-decoration: none; margin-top: -20px;">
                                    <button class="btn-get-started scrollto" style="border: none;" type="submit">Keluar</button>
                                </a>
                            </li>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="/login">Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="/register">Daftar</a>
                        </li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->