@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row ">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="margin-top: 100px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img class="opacity-75" src="http://source.unsplash.com/1350x300?company" class="d-block w-100"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img class="opacity-75" src="http://source.unsplash.com/1350x300?product" class="d-block w-100"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="opacity-75" src="http://source.unsplash.com/1350x300?market" class="d-block w-100"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="card" style="width: 60rem;">
                <div class="card-body px-4 py-5">
                    <div class="d-flex">
                        <div class="container col-2">
                            <div class="container card d-flex align-items-center col-2" style="width: 9rem; height: 100%;">
                                <div class="container card-body d-flex align-items-center mx-auto" style="width: auto;">
                                    @if ($umkm->foto != null)
                                    <img src="{{ asset('storage/' . $umkm->foto->photo_name) }}" alt="" class="img-fluid mx-auto d-block" style="width: auto; height: 75%;">
                                    @else
                                    <img src="http://source.unsplash.com/300x200?company" alt="" class="img-fluid mx-auto d-block" style="width: auto; height: 75%;">
                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-10 ms-5">
                            <div class="d-flex justify-content-between">
                                <h3 class="fw-bold">{{ $umkm->name }}</h3>
                                {{-- <a href="/appointment/{{ $umkm->name }}" class="btn btn-success me-5">Buat Janji</a> --}}
                            </div>
                            <div class="d-flex me-5">
                                <span data-feather="map-pin"></span>
                                <p clas>{{ $umkm->address }}</p>
                            </div>
                            <div class="d-flex mt-4">
                                <div class="col-auto">
                                    <h6>Website</h6>
                                    <h6>{{ $umkm->website }}</h6>
                                </div>
                                <span class="border-end col-auto ms-4 me-4"></span>
                                <div class="col-auto">
                                    <h6>Sektor Bisnis</h6>
                                    <h6>{{ $umkm->business_sector }}</h6>
                                </div>

                                <span class="border-end col-auto ms-4 me-4"></span>
                                <div class="col-auto">
                                    <h6>Alamat Email</h6>
                                    <h6>{{ $umkm->email }}</h6>
                                </div>

                                <span class="border-end col-auto ms-4 me-4"></span>
                                <div class="col-auto">
                                    <h6>Nomor Telepon</h6>
                                    <h6>{{ $umkm->telp }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('body')

    </div>
@endsection
