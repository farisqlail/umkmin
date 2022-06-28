@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row text-center">
        <div class="bg-image text-white "
            style="background-image: url('http://source.unsplash.com/1200x300?company'); height:40vh; opacity: 0.75;">
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
                <p>Misi kami adalah membangun platform yang paling tepercaya dan independen untuk memahami cara orang
                    berpindah di dunia nyata.</p>
                <div class="d-flex mt-5">
                    <div class="col-6 ">
                        <img src="{{ asset('/assets/b1.png') }}" alt="">
                        <p class="fw-bold mt-2">Ciptakan Masa Depan</p>
                        <p>Kami bergerak cepat, mendobrak batasan, dan mencoba hal baru dengan percaya diri dan
                            optimisme.</p>

                        <img src="{{ asset('/assets/b3.png') }}" alt="">
                        <p class="fw-bold mt-2">Menjadi Pendengar Yang Baik</p>
                        <p>Kami mendorong berbagai perspektif karena dapat memperkuat produk dan perusahaan kami.</p>
                    </div>
                    <div class="col-6 ms-3">
                        <img src="{{ asset('/assets/b2.png') }}" alt="">
                        <p class="fw-bold mt-2">Jangan Pernah Puas</p>
                        <p>Kami terus berupaya menjadikan segalanya lebih baik, mudah, cepat, dan sederhana. Selalu.</p>

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
            <div class="col-3 mt-5 ms-5" >
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
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap">
                    </div>
                    <div class="ms-2">
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Telp">
                      </div>
                </div>
                <div class="mt-4">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Perihal">
                  </div>
                  <div class="mt-4">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Pesan">
                  </div>
                  <button type="submit" class="btn btn-success mt-4">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

{{-- <div class="px-4">
    <div class="card" style="width: 18rem;">
        <img src="http://source.unsplash.com/500x400?elon-musk" class="card-img-top" alt="...">
        <div class="card-body">
            <div class="text-center align-items-center">
                <p class="card-text fw-bold">Hildan Hanjar Utama</p>
                <hr width="70" style="margin: auto;">
                <p class="card-text">Backend Developer</p>
            </div>
        </div>
    </div>
</div>
<div class="px-4">
    <div class="card" style="width: 18rem;">
        <img src="http://source.unsplash.com/300x340?nature" class="card-img-top" alt="...">
        <div class="text-center" style="margin:auto">
            <div style=" font-size: 13px">
                <div class="card py-2" style="width: 13rem;">
                    <p class="card-text fw-bold">Hildan Hanjar Utama</p>
                    <hr width="70" style="margin: auto; ">
                    <p class="card-text mt-1">Backend Developer</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}