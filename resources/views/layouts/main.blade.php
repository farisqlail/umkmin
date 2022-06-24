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

    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="{{ asset('/assets/icon-web.png') }}">
    <script type="text/javascript" src="/js/trix.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
          display: none;
        }
      </style>

    <title>UMKM.IN | {{ $title }}</title>
</head>

<body>

    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>

    <div class="container">
        <div class="row mt-5 bg-nyala">
            <div class="col">
                <h3 class="mb-5 mt-5 text-center">Mitra Kami</h3>
                <div class="row justify-content-center ">
                    <div class="row mt-2 mb-5">

                        <div class="col-sm-3">
                            <img src="{{asset('/assets/sekolah.png') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-3">
                            <img src="{{asset('/assets/kampusmerdeka.png') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-3">
                            <img src="{{asset('/assets/bineka.png') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="col-sm-3">
                            <img src="{{asset('/assets/sekolahekspor.png') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>

                <h3 class="fw-bold warna-text-bawah">UMKM.IN</h3>
                <div class="d-flex warna-text-bawah">
                    <span data-feather="phone"></span>
                    <p class="ms-2">(+62) 24 376 1402</p>
                </div>
                <div class="d-flex warna-text-bawah">
                    <span data-feather="mail"></span>
                    <p class="mb-5 ms-2">info@umkm.in.com</p>
                </div>
            </div>

            <p class="mb-3 text-center warna-text-bawah">Copyright © 2020 UMKM.IN. All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

    <script src="/js/dashboard.js"></script>
</body>

</html>