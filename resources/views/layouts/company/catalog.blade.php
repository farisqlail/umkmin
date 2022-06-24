@extends('layouts.company.main')

@section('body')
    <div class="row mt-5 ms-5 me-5">
        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/profile/{{ $umkm->name }}">Gambaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/catalog/{{ $umkm->name }}">Katalog Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/appointment/{{ $umkm->name }}">Buat Janji</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row mt-4 px-5">
        <div class="d-flex">
            {{-- <h1>{{ $product }}</h1> --}}
            <div class="col-md-2 px-5">
                <div class="card" style="width: 12rem;">
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $product->photo_name) }}" alt="" width="160"
                            height="200">
                    </div>
                </div>
            </div>
            <div class="col-md-10 px-5 mx-3">
                <div class="d-flex justify-content-between">
                    <h4>{{ $product->prod_name }}</h4>
                    <a href="/appointment/{{ $umkm->name }}" class="btn btn-success me-5">Buat Janji</a>
                </div>
                <table>
                    <tr>
                        <td>Brand</td>
                        <td>&nbsp;: {{ $product->prod_title }}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>&nbsp;: {{ $product->category_name }}</td>
                    </tr>
                </table>

                <article class="me-5 mt-4" style="text-align: justify;">
                    {!! $product->prod_desc !!}
                </article>
            </div>
        </div>
    </div>


    <hr class="ms-5 me-5 mt-5">

    <div class="row ms-5 mt-5 me-5">
        <div class="col">
            <h4>Katalog Produk</h4>
            <div class="row my-3 fs-5 ">

                @foreach ($products->whereNotIn('id', [$product->id]) as $prod)
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('storage/' . $prod->photo_name) }}" class="card-img-top" alt="..."
                                width="300" height="200">
                            <div class="card-body">
                                <a href="/catalog/{{ $prod->slug }}" class="text-black" style="text-decoration: none;">
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
