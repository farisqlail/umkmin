@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row ms-4" >
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
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
                    <img class="opacity-75" src="http://source.unsplash.com/1200x300?company" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        {{-- <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p> --}}
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img class="opacity-75" src="http://source.unsplash.com/1200x300?product" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        {{-- <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p> --}}
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="opacity-75" src="http://source.unsplash.com/1200x300?market" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        {{-- <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p> --}}
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

    <div class="row mt-5 px-5">
        <div class="col-3">
            <div class="row">
                <h3 class="fw-bold mb-4">Filter</h3>
                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header fw-bold">Kategori</div>
                    <div class="card-body text-secondary">
                        <a href="/products" class="card-text sektor" style="text-decoration: none">All</a>
                        <br>
                        @foreach ($categories as $category)
                        <a href="/companies/{{ $category->category_name }}" class="card-text sektor" style="text-decoration: none">{{ $category->category_name }}</a>
                        <br>
                        @endforeach
                    </div>
                </div>

                {{-- <div class="card border-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header fw-bold">Wilayah</div>
                    <div class="card-body text-secondary">
                        <a href="" class="card-text sektor" style="text-decoration: none">Jawa Timur (122)</a>
                        <br>
                        <a href="" class="card-text sektor" style="text-decoration: none">Jawa Barat (98)</a>
                        <br>
                        <a href="" class="card-text sektor" style="text-decoration: none">Jawa Tengah (216)</a>
                        <br>
                        <a href="" class="card-text sektor" style="text-decoration: none">Banten (110)</a>
                        <br>
                        <a href="" class="card-text sektor" style="text-decoration: none">DKI Jakarta (76)</a>
                        <br>
                        <a href="" class="card-text sektor" style="text-decoration: none">DI Yogyakarta (85) </a>
                        <br>
                        <a href="" class="card-text sektor" style="text-decoration: none">Bali (105)</a>
                        <br>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="col-9">
            <h3 class="fw-bold mb-4 ms-3">Perusahaan</h3>
            <form action="/companies" class="row ms-2">
                <div class="d-flex">
                    <div class="col-11">
                        {{-- @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif --}}
                        <label for="cariPerusahaan" class="visually-hidden"></label>
                        <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">  
                    </div>
                    <div class="ms-2">
                        <button type="submit" class="btn btn-success mb-3"><span data-feather="search"></span></button>
                    </div>
                </div>
            </form>
            <div class="row ms-2">
                @if ($umkms->count())
                @foreach ($umkms as $umkm)
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        @if ($umkm->foto != null)
                        <img src="{{ asset('storage/' . $umkm->foto->photo_name) }}" class="card-img-top" alt="..."  width="300" height="200">
                        @else
                        <img src="http://source.unsplash.com/300x200?company" class="card-img-top" alt="..."  width="300" height="200">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-bold hurufbesar">{{ $umkm->name }}</h5>
                            <p class="card-text fw-light hurufkecil">{{ $umkm->address }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-center fs-4">No post found.</p>
                @endif
                

            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection