@extends('layouts.main')

@section('container')

    @if (session()->has('status') && session('status') == "success")
  
        <script type='text/javascript'> 
            Swal.fire('Selamat Datang Di UMKM.IN')
        </script>
  
    @endif

<div class="container">
    <div class="row text-center" style="margin-top: 60">
        <div class="bg-image text-white img-fluid" style="background-image: url('/assets/bg1.png'); height:70vh">
            <div class="mx-auto" >
            <div class="mt-5">
                <h1 style="margin-top: 130px">Kembangkan Bisnis Anda Bersama UMKM.IN</h1>
                <h6 class="mt-5" >Temukan berbagai layanan digital di UMKM.IN, mulai dari pembaruan profil perusahaan,
                    <br>    
                    promosi produk, hingga layanan digital menarik lainnya. Jadi, apa yang anda tunggu? Mari bergabung
                    dengan kami</h5>
            </div>
            <form action="/products" class="row g-1 justify-content-center mt-5">
                <div class="col-3">
                    @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <label for="cariPerusahaan" class="visually-hidden"></label>
                    <input type="text" class="form-control" placeholder="Cari produk..." name="search" value="{{ request('search') }}"> 
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success mb-3">Cari</button>
                </div>
            </form>
        </div>
        </div>
        {{-- <img src="{{asset('/assets/bg1.png') }}" alt="" > --}}

    </div>

    <div class="row align-items-center bg-nyala ">
        <div class="col">
            <div class="row mt-4">
                <div class="col-2">
                    <img src="{{asset('/assets/claim.png') }}" alt="">
                </div>
                <div class="col-9">
                    <h5>Klaim Informasi Bisnis Anda</h5>
                    <p>Kami akan mengirimkan informasi bisnis anda kepada anda melalui email</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row mt-4">
                <div class="col-2">
                    <img src="{{asset('/assets/megaphone.png') }}" alt="">
                </div>
                <div class="col-9">
                    <h5>Promosikan Bisnis Anda</h5>
                    <p>Kami akan mengirimkan promosi bisnis anda kepada anda melalui email</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col">
            <h3 class="text-center mb-5">Daftar Perusahaan</h3>
            <div class="row justify-content-center ">
                <div class="row">
                    @foreach ($umkms as $umkm)
                    <input type="text" id="idUmkm" name="idUmkm" value="{{ $umkm->id }}" hidden>
                    <div class="col-sm-3 mb-4">
                        <div class="card">
                            @if ($umkm->photo_id)
                            <img src="{{ asset('storage/' . $umkm->foto->photo_name) }}" class="card-img-top" alt="..." width="300" height="200">
                            @else
                            <img src="http://source.unsplash.com/300x200?company" class="card-img-top" alt="..." width="300" height="200">
                            @endif
                            <div class="card-body">
                                <a href="/profile/{{ $umkm->name }}" class="text-black" style="text-decoration: none;"><h5 class="card-title fw-bold hurufbesar">{{ $umkm->name }}</h5></a>
                                <p class="card-text fw-light hurufkecil">{{ $umkm->address }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <a href="/companies" class="mt-3 text-end" style="text-decoration: none">Lihat Lebih Banyak</a>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5 bg-nyala">
        <div class="col">
            <h3 class="text-center mb-5 mt-5">Daftar Produk</h3>
            <div class="row justify-content-center ">
                <div class="row">
                    @foreach ($products as $prod)
                    <input type="hidden" id="prod" name="prod" value="{{ $prod->id }}" >
                    <input type="hidden" id="idUmkm" name="idUmkm" value="{{ $prod->user_id }}" >
                    <div class="col-sm-3 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $prod->photo->photo_name) }}" class="card-img-top" alt="..." width="300" height="200">
                            <div class="card-body">
                                <a href="/catalog/{{ $prod->slug }}" class="text-black" style="text-decoration: none;"><h5 class="card-title fw-bold hurufbesar">{{ $prod->prod_title }}</h5></a>
                                <p class="card-text fw-light hurufkecil">{{ $prod->prod_name }}</p>
                                <p class="card-text">
                                    <small class="text-muted">Posted {{ $prod->created_at->diffForHumans() }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
                <a href="/products" class="mt-3 mb-3 text-end" style="text-decoration: none">Lihat Lebih Banyak</a>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col">
            <h3 class="text-center mb-5">Berita Terbaru</h3>
            <div class="row justify-content-center ">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="card">
                            <img src="http://source.unsplash.com/300x200?news" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <a href="" style="text-decoration: none">April 15, 2022</a>
                                    <a href="" style="text-decoration: none">UMKM.IN News</a>
                                </div>
                                <p class="card-text fw-bold hurufbesar">Mantap! Tembus Rp 156M, Komoditas Ikan Bali
                                    diminati di Amerika
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <img src="http://source.unsplash.com/300x200?news" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <a href="" style="text-decoration: none">April 15, 2022</a>
                                    <a href="" style="text-decoration: none">UMKM.IN News</a>
                                </div>
                                <p class="card-text fw-bold hurufbesar">Ini 'Pahlawan' yang Bikin Neraca Dagang RI
                                    Surplus 23 Kali Beruntun
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <img src="http://source.unsplash.com/300x200?news" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <a href="" style="text-decoration: none">April 15, 2022</a>
                                    <a href="" style="text-decoration: none">UMKM.IN News</a>
                                </div>
                                <p class="card-text fw-bold hurufbesar">Jajanan Lokal RI Bisa Tembus Pasar Ekspor,
                                    Caranya?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" class="mt-3 text-end" style="text-decoration: none">Lihat Lebih Banyak</a>
            </div>
        </div>
    </div>


    


</div>
@endsection