<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="shortcut icon" href="{{ asset('/assets/icon-web.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Daftar Akun UMKM.IN</title>
</head>
<body>
    <div class="container">
        <div class="img-umkm d-flex justify-content-center">
            <img src="{{ asset('/assets/Logo/UMKM.png')}}" alt="" srcset="" class="mt-3">
        </div>
        <div>
            <h3 class="text-center mt-4"><b>Bergabunglah dengan UMKM.IN, bisnis anda menuju <br> ekonomi terbesar di Asia Tenggara</b></h3>
        </div>
        <div class="row ">
            <div class="col mt-3 d-flex justify-content-center">
                <div class="kotak-register">
                    <div class="container mt-3">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('/assets/Register/visitor.png')}}" alt="" srcset="" class="mt-5">
                        </div>
                        <h4 class="text-center mt-2"><b>Untuk Pengguna</b></h4>
                        <p class="text-center mt-2">Jadilah pengguna dan jelajahi lebih dari <br> 3.000+ produk yang sesuai dengan <br> kebutuhan bisnis Anda</p>
                        <div class="mb-3 col-sm-10 mt-4 mx-auto">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-danger" href="/registervisitor"><b>Daftar Pengguna</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mt-3 d-flex justify-content-center">
                <div class="kotak-register">
                    <div class="container mt-3">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('/assets/Register/marchent.png')}}" alt="" srcset="" class="mt-5">
                        </div>
                        <h4 class="text-center mt-2"><b>Untuk Mitra</b></h4>
                        <p class="text-center mt-2">Daftarkan bisnis anda sebagai mitra <br> dan promosikan produk anda ke pasar <br> Indonesia dan global</p>
                        <div class="mb-3 col-sm-10 mt-4 mx-auto">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-danger" href="/registermitra"><b>Daftar Mitra</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2 mt-5 col-sm-8 mx-auto">
            <p class="text-center"><b> Sudah Punya Akun ? </b><a href="/login" class="text-danger"><b> Masuk Disini</b></a></p>
        </div>
    </div>
</body>
</html>