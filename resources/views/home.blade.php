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
            <a href="index.html" class="logo"><img src="{{ asset('/assets/UMKM.png') }}" alt=""
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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Kembangkan Bisnis Anda Bersama UMKM.IN</h1>
                    <h2>emukan berbagai layanan digital di UMKM.IN, mulai dari pembaruan profil perusahaan,
                        promosi produk, hingga layanan digital menarik lainnya. Jadi, apa yang anda tunggu? Mari
                        bergabung
                        dengan kami
                    </h2>
                    <div>
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('./users/assets/img/hero-img.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div
                        class="col-xl-5 col-lg-6 d-flex justify-content-center video-box align-items-stretch position-relative">
                    </div>

                    <div
                        class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>Benefit untuk UMKM anda</h3>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-fingerprint"></i></div>
                            <h4 class="title"><a href="">Klaim Informasi Bisnis Anda</a></h4>
                            <p class="description">Kami akan mengirimkan informasi bisnis anda kepada anda melalui email
                            </p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-gift"></i></div>
                            <h4 class="title"><a href="">Promosikan Bisnis Anda</a></h4>
                            <p class="description">Kami akan mengirimkan promosi bisnis anda kepada anda melalui email
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Daftar Perusahaan</h2>
                </div>

                <div class="row">
                    @foreach ($umkms as $umkm)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                            <input type="text" id="idUmkm" name="idUmkm" value="{{ $umkm->id }}" hidden>
                            <div class="card">
                                @if ($umkm->photo_id)
                                    <img src="{{ asset('storage/' . $umkm->foto->photo_name) }}"
                                        class="card-img-top" alt="..." width="300" height="200">
                                @else
                                    <img src="http://source.unsplash.com/300x200?company" class="card-img-top"
                                        alt="..." width="300" height="200">
                                @endif
                                <div class="card-body">
                                    <a href="/profile/{{ $umkm->name }}" class="text-black"
                                        style="text-decoration: none;">
                                        <h5 class="card-title fw-bold hurufbesar">{{ $umkm->name }}</h5>
                                    </a>
                                    <p class="card-text fw-light hurufkecil">{{ $umkm->address }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div align="center">
                    <a href="/companies" class="btn-get-started scrollto">Lihat Lebih Banyak</a>
                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container">

                <div class="section-title">
                    <h2>Daftar Produk</h2>
                </div>

                <div class="row no-gutters">
                    @foreach ($products as $prod)
                        <div class="col-lg-3 col-md-4">
                            <input type="hidden" id="prod" name="prod" value="{{ $prod->id }}">
                            <input type="hidden" id="idUmkm" name="idUmkm" value="{{ $prod->user_id }}">
                            <div class="card">
                                <img src="{{ asset('storage/' . $prod->photo->photo_name) }}" class="card-img-top"
                                    alt="..." width="300" height="200">
                                <div class="card-body">
                                    <a href="/catalog/{{ $prod->slug }}" class="text-black"
                                        style="text-decoration: none;">
                                        <h5 class="card-title fw-bold hurufbesar">{{ $prod->prod_title }}</h5>
                                    </a>
                                    <p class="card-text fw-light hurufkecil">{{ $prod->prod_name }}</p>
                                    <p class="card-text">
                                        <small class="text-muted">Posted
                                            {{ $prod->created_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div align="center">
                    <a href="/products" class="btn-get-started scrollto">Lihat Lebih Banyak</a>
                </div>
            </div>
        </section><!-- End Gallery Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <h4></h4>
            <!-- ======= Clients Section ======= -->
            <section id="clients" class="clients">
                <div class="container">

                    <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="client-logo">
                                <img src="{{ asset('/assets/sekolah.png') }}" class="img-fluid" alt=""
                                    width="100px" style="height: auto;">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="client-logo">
                                <img src="{{ asset('/assets/kampusmerdeka.png') }}" class="img-fluid"
                                    alt="" width="100px" style="height: auto;">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="client-logo">
                                <img src="{{ asset('/assets/bineka.png') }}" class="img-fluid" alt=""
                                    width="100px" style="height: auto;">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="client-logo">
                                <img src="{{ asset('/assets/sekolahekspor.png') }}" class="img-fluid"
                                    alt="" width="100px" style="height: auto;">
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Clients Section -->
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>UMKM.IN</h3>
                        <p>
                            <strong>Phone:</strong> (+62) 24 376 1402<br>
                            <strong>Email:</strong> info@umkm.in.com<br>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright justify-content-end">
                &copy; Copyright <strong><span>UMKM.IN</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('./users/assets/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('./users/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('./users/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('./users/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('./users/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('./users/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('./users/assets/js/main.js') }}"></script>

</body>

</html>
