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
                <form action="/reset-password-ps" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="ms-5">
                    <div class="mt-3 form-group row ">
                        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="email" id="email_address" class="form-control" name="email"  value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-3  form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-6">
                            <input type="password" id="password" class="form-control" name="password" required autofocus>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class=" mt-3 form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                        <div class="col-md-6">
                            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-3  col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Ubah Password
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>