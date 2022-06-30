<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('/assets/icon-web.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Daftar Akun UMKM.IN</title>
</head>
<style>
    .btn-regist-mitra {
        border: 2px #A55659 solid;
        color: #A55659;
    }

    .btn-regist-mitra:hover {
        background-color: #A55659;
        border: none;
        transition: 0.2;
        color: #fff;
    }

    .btn-regist-pengguna {
        background-color: #2F3A70;
        color: #fff;
        border: none;
    }

    .btn-regist-pengguna:hover {
        background-color: none;
        color: #2F3A70;
        border: 2px #2F3A70 solid;
    }
</style>

<body>
    <div class="container">
        <div class="img-umkm d-flex justify-content-center">
            <img src="{{ asset('/assets/Logo/UMKM.png') }}" alt="" srcset="" class="mt-3">
        </div>
        <div class="card p-4 shadow rounded mt-4 mb-4" style="border: none;">
            <div class="card-body">
                <h3 class="text-center mt-4"><b>Bergabunglah dengan UMKM.IN, bisnis anda menuju <br> ekonomi terbesar di
                        Asia Tenggara</b></h3>

                <div class="row">
                    <div class="col mt-3 d-flex justify-content-center">
                        <div class="container mt-3">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('/assets/Register/visitor.png') }}" alt="" srcset=""
                                    class="mt-5">
                            </div>
                            <h4 class="text-center mt-2"><b>Untuk Pengguna</b></h4>
                            <p class="text-center mt-2">Jadilah pengguna dan jelajahi lebih dari <br> 3.000+ produk
                                yang sesuai dengan <br> kebutuhan bisnis Anda</p>
                            <div class="mb-3 col-sm-10 mt-4 mx-auto">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-regist-pengguna" href="/registervisitor"><b>Daftar
                                            Pengguna</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3 d-flex justify-content-center">
                        <div class="container mt-3">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('/assets/Register/marchent.png') }}" alt="" srcset=""
                                    class="mt-5">
                            </div>
                            <h4 class="text-center mt-2"><b>Untuk Mitra</b></h4>
                            <p class="text-center mt-2">Daftarkan bisnis anda sebagai mitra <br> dan promosikan
                                produk anda ke pasar <br> Indonesia dan global</p>
                            <div class="mb-3 col-sm-10 mt-4 mx-auto">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-regist-mitra" href="/registermitra"><b>Daftar Mitra</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center"><b> Sudah Punya Akun ? </b><a href="/login" style="color: #A55659"><b> Masuk
                            Disini</b></a></p>
            </div>
        </div>
    </div>
</body>

</html>
