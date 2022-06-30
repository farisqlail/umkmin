<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('/assets/icon-web.png') }}">
    <script type="text/javascript" src="/js/trix.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>UMKM.IN | {{ $title }}</title>
</head>

<body>

    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="mt-5">

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
