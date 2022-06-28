@extends('layouts.company.main')

@section('body')

    <div class="row mt-5 ms-5 me-5">
        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link text-dark active" aria-current="page" href="/profile/{{ $umkm->name }}">Gambaran</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="/catalogs/{{ $umkm->name }}">Katalog Produk</a>
                </li>
              </ul>
        </div>
    </div>

    <div class="row ms-5 mt-5 me-5">
        <div class="col">
            <h4>Tentang Perusahaan</h4>
            <article class="my-3 fs-5 " style="text-align: justify;">
                {!! $umkm->desc !!}
            </article>
        </div>
    </div>

    <hr class="ms-5 me-5 mt-5">

    <div class="row ms-5 mt-5 me-5">
        <div class="col">
            <h4>Katalog Produk</h4>
            <div class="row my-3 fs-5 ">

                @foreach ($products as $prod)
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('storage/' . $prod->photo_name) }}" class="card-img-top" alt="..."
                                width="300" height="200">
                            <div class="card-body">
                                <a href="" class="text-black" style="text-decoration: none;">
                                    <h5 class="card-title fw-bold hurufbesar">{{ $prod->prod_title }}</h5>
                                </a>
                                <p class="card-text fw-light hurufkecil">{{ $prod->prod_name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection