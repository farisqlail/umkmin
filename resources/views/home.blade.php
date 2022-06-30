@extends('layouts.main')

@section('container')

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


@endsection