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
                                <li><a class="nav-link scrollto active" href="/dashboard">UMKM</a></li>
                            @else
                                <li><a class="nav-link scrollto" href="/">UMKM</a></li>
                                <script type='text/javascript'>
                                    Swal.fire({
                                        text: 'Anda harus verified email terlebih dahulu!!!',
                                        icon: 'error',
                                    })
                                </script>
                            @endif
                        @elseif (auth()->user()->role == 'admin')
                            <li><a class="nav-link scrollto" href="/manajemen/categories">Admin</a></li>
                        @endif
                    @else
                        <li><a class="nav-link scrollto " href="/dashboard">UMKM</a></li>
                    @endauth
                    <li><a class="nav-link scrollto" href="/">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="/about">Tentang</a></li>
                    @auth
                        <form action="/keluar" method="post">
                            @csrf
                            <li><a class="nav-link scrollto" href="" type="submit">Keluar</a></li>
                        </form>
                    @else
                        <li><a class="nav-link scrollto" href="/login">Masuk</a></li>
                        <li><a class="nav-link scrollto" href="/register">Daftar</a></li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <div class="container mt-5">
        <div class="row text-center">
            <div class="bg-image text-white mt-5"
                style="background-image: url('http://source.unsplash.com/1200x300?company'); height:40vh; opacity: 0.75; margin-top: 50px;">
                <div class="mx-auto">
                    <div class="mt-5">
                        <h1>Tentang Kami</h1>
                        <h6 class="mt-5 ">UMKM.IN diluncurkan pada tahun 2022 dengan visi untuk mengembangkan reputasi
                            bisnis <br> melalui profil perusahaan Anda.</h5>
                    </div>
                </div>
            </div>
            {{-- <img src="{{asset('/assets/bg1.png') }}" alt="" > --}}

        </div>

        <div class="row bg-nyala">
            <div class="d-flex mt-5 ms-5 mb-5">
                <div class="col-3">
                    <h2 class="fw-bold">Kenali tentang</h2>
                    <h2 class="fw-bold color-about">perusahaan kami</h2>
                </div>
                <div class="col-7 ms-5">
                    <p>Misi kami adalah membangun platform yang paling tepercaya dan independen untuk memahami cara
                        orang
                        berpindah di dunia nyata.</p>
                    <div class="d-flex mt-5">
                        <div class="col-6 ">
                            <img src="{{ asset('/assets/b1.png') }}" alt="">
                            <p class="fw-bold mt-2">Ciptakan Masa Depan</p>
                            <p>Kami bergerak cepat, mendobrak batasan, dan mencoba hal baru dengan percaya diri dan
                                optimisme.</p>

                            <img src="{{ asset('/assets/b3.png') }}" alt="">
                            <p class="fw-bold mt-2">Menjadi Pendengar Yang Baik</p>
                            <p>Kami mendorong berbagai perspektif karena dapat memperkuat produk dan perusahaan kami.
                            </p>
                        </div>
                        <div class="col-6 ms-3">
                            <img src="{{ asset('/assets/b2.png') }}" alt="">
                            <p class="fw-bold mt-2">Jangan Pernah Puas</p>
                            <p>Kami terus berupaya menjadikan segalanya lebih baik, mudah, cepat, dan sederhana. Selalu.
                            </p>

                            <img src="{{ asset('/assets/b4.png') }}" alt="">
                            <p class="fw-bold mt-2">Percaya Satu Sama Lain</p>
                            <p>Platform kami berlandaskan kepercayaan, baik di antara kami sendiri maupun dari pengguna
                                kepada kami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ms-5 me-5 mt-5">
            <div class="d-flex justify-content-center">
                <div class="d-flex lh-1 px-5">
                    <div class="col-auto">
                        <img src="{{ asset('/assets/b5.png') }}" alt="">
                    </div>
                    <div class="ms-3">
                        <p class="fs-2 fw-bold">100+</p>
                        <p>Perusahaan</p>
                    </div>
                </div>
                <div class="d-flex lh-1 px-5">
                    <div class="col-auto">
                        <img src="{{ asset('/assets/b6.png') }}" alt="">
                    </div>
                    <div class="ms-3">
                        <p class="fs-2 fw-bold">250+</p>
                        <p>Produk</p>
                    </div>
                </div>
                <div class="d-flex lh-1 px-5">
                    <div class="col-auto">
                        <img src="{{ asset('/assets/b7.png') }}" alt="">
                    </div>
                    <div class="ms-3">
                        <p class="fs-2 fw-bold">50+</p>
                        <p>Pengguna</p>
                    </div>
                </div>
                <div class="d-flex lh-1 px-5">
                    <div class="col-auto">
                        <img src="{{ asset('/assets/b8.png') }}" alt="">
                    </div>
                    <div class="ms-3">
                        <p class="fs-2 fw-bold">4</p>
                        <p>Mitra</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row bg-nyala">
            <div class="d-flex justify-content-center mt-5">
                <h2 class="fw-bold">Tim</h2>
                <h2 class="ms-2 fw-bold color-about">Kami</h2>
            </div>
            <div class="d-flex justify-content-center mb-5 mt-4">
                <div class="px-4">
                    <div class="card"
                        style="background-image: url('{{ asset('/assets/gagan.png') }}'); height:340px; width: 300px">
                        <div class="text-center" style="margin:auto">
                            <div style="margin-top: 300px; font-size: 13px">
                                <div class="card py-2" style="width: 13rem;">
                                    <p class="card-text fw-bold text-dark">Ichsan Ghaniy Rosyidi</p>
                                    <hr width="70" style="margin: auto; ">
                                    <p class="card-text mt-1 text-muted">Project Owner</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4">
                    <div class="card"
                        style="background-image: url('{{ asset('/assets/faisal.png') }}'); height:340px; width: 300px">
                        <div class="text-center" style="margin:auto">
                            <div style="margin-top: 300px; font-size: 13px">
                                <div class="card py-2" style="width: 13rem;">
                                    <p class="card-text fw-bold text-dark">Faisal Maulana Akbar</p>
                                    <hr width="70" style="margin: auto; ">
                                    <p class="card-text mt-1 text-muted">Frontend Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4">
                    <div class="card"
                        style="background-image: url('{{ asset('/assets/baron1.png') }}'); height:340px; width: 300px">
                        <div class="text-center" style="margin:auto">
                            <div style="margin-top: 300px; font-size: 13px">
                                <div class="card py-2" style="width: 13rem;">
                                    <p class="card-text fw-bold text-dark">Barron Mahardhika Al Fahmi</p>
                                    <hr width="70" style="margin: auto; ">
                                    <p class="card-text mt-1 text-muted">Frontend Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4" style="margin-bottom: 100px">
                <div class="px-4 ">
                    <div class="card"
                        style="background-image: url('{{ asset('/assets/marcel.png') }}'); height:340px; width: 300px">
                        <div class="text-center " style="margin:auto">
                            <div style="margin-top: 300px; font-size: 13px">
                                <div class="card py-2" style="width: 13rem;">
                                    <p class="card-text fw-bold text-dark">Marcellinus Calvin Gunawan</p>
                                    <hr width="70" style="margin: auto; ">
                                    <p class="card-text mt-1 text-muted">Backend Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4">
                    <div class="card"
                        style="background-image: url('{{ asset('/assets/hildan2.png') }}'); height:340px; width: 300px">
                        <div class="text-center" style="margin:auto">
                            <div style="margin-top: 300px; font-size: 13px">
                                <div class="card py-2" style="width: 13rem;">
                                    <p class="card-text fw-bold text-dark">Hildan Hanjar Utama</p>
                                    <hr width="70" style="margin: auto; ">
                                    <p class="card-text mt-1 text-muted">Backend Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="d-flex justify-content-center mt-5">
                <h2 class="fw-bold">Hubungi</h2>
                <h2 class="ms-2 fw-bold color-about">Kami</h2>
            </div>
            <div class="d-flex justify-content-center mb-5">
                <div class="col-3 mt-5 ms-5">
                    <div class="d-flex ">
                        <div class="col-auto">
                            <img src="{{ asset('/assets/map-pin.svg') }}" alt="">
                        </div>
                        <div class="ms-3" style="line-height: 0.5;">
                            <p class="fw-bold" style="font-size: 20px">Lokasi</p>
                            <p style="font-size: 13px">Jl. Kebonsari Timur, No.6, Surabaya</p>
                        </div>
                    </div>
                    <div class="d-flex  mt-4">
                        <div class="col-auto">
                            <img src="{{ asset('/assets/mail.svg') }}" alt="">
                        </div>
                        <div class="ms-3" style="line-height: 0.5;">
                            <p class="fw-bold" style="font-size: 20px">Email</p>
                            <p style="font-size: 13px">info@umkm.in.com</p>
                        </div>
                    </div>
                    <div class="d-flex  mt-4">
                        <div class="col-auto">
                            <img src="{{ asset('/assets/phone.svg') }}" alt="">
                        </div>
                        <div class="ms-3" style="line-height: 0.5;">
                            <p class="fw-bold" style="font-size: 20px">Telepon</p>
                            <p style="font-size: 13px">(+62) 24 376 1402</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 ms-5">
                    <form action="">
                        <div class="d-flex">
                            <div class="">
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Nama Lengkap">
                            </div>
                            <div class="ms-2">
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Telp">
                            </div>
                        </div>
                        <div class="mt-4">
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="Perihal">
                        </div>
                        <div class="mt-4">
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="Pesan">
                        </div>
                        <button type="submit" class="btn btn-success mt-4">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
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
