<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="shortcut icon" href="{{ asset('/assets/icon-web.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Kode Keamanan User UMKM.IN</title>
</head>
<body>
    <div class="container">
        <div class="img-umkm d-flex justify-content-center">
            <img src="{{ asset('/assets/Logo/UMKM.png')}}" alt="" srcset="" class="mt-3">
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div class="kotak-forgot">
                <h4 class="mt-5 text-center"><b>Lupa Kata Sandi ?</b></h4>
                <p class="mt-2 text-center">Dimohon mengisikan alamat email yang sudah <br> terdaftar pada akun UMKM.IN untuk melakukan <br> perubahan kata sandi pada akun anda. Anda akan <br> menerima melalui email anda tentang petunjuk <br> dan kode kemanan.</p>
                <div class="container col-11">
                    <h3 class="mt-5"><b>Masukkan Kode Keamanan</b></h3>
                    <input type="text" class="form-control mt-3" id="email" placeholder="Masukkan Kode Keamanan/Kode OTP">
                </div>
                <div class="d-grid gap-2 col-4 p-3 mx-auto mt-5">
                    <a class="btn btn-danger p-3" href="/sandi"><b>Kirim</b></a>
                </div>
                <div class="mb-3 col-sm-8 mx-auto">
                    <p class="text-center"><b> Atau Masuk Kembali </b><a href="/login" class="text-danger"><b>Klik Disini</b></a></p>
                </div>
            </div>
        </div>

    </div>
</body>
</html>