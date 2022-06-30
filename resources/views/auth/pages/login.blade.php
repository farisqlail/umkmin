<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('/assets/icon-web.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Halaman Masuk User UMKM.IN</title>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    .btn-login {
        background-color: #2F3A70;
        color: #fff;
        border: none;
    }

    .btn-login:hover {
        background-color: none;
        color: #2F3A70;
        border: 2px #2F3A70 solid;
    }
</style>

<body>

    @if (session()->has('status') && session('status') == 'success')
        <script type='text/javascript'>
            Swal.fire('Anda Berhasil Mendaftar, Silahkan Verifikasi Akun Anda yang Telah Dikirim Melalui Email Anda')
        </script>
    @elseif (session()->has('status') && session('status') == 'failed')
        <script type='text/javascript'>
            Swal.fire({
                text: 'Username dan Password Salah',
                icon: 'error',
            })
        </script>
    @endif

    <div class="container" style="height: 100vh;">
        <div class="row" style="height: 100vh;">
            <div class="col d-flex align-items-center" style="height: 100vh;">
                <img src="{{ asset('/assets/Logo/UMKM.png') }}" alt="" srcset="" class="img-login ">
            </div>
            <div class="col d-flex align-items-center" style="height: 100vh;">
                <div class="card d-flex align-items-center p-4 shadow rounded" style="width: 40rem; border: none">
                    <div class="col-12">
                        <h1 class="text-center" style="color: #454555;"><b>Masuk</b></h1>
                        <div class="mx-5">
                            <form action="/masuk" method="post">
                                @csrf
                                <div class="form-floating mt-2">
                                    <input type="text"
                                        class="form-control rounded-top @error('username') is-invalid @enderror"
                                        name="username" id="username" placeholder="Username" required
                                        value="{{ old('username') }}">
                                    <label for="username">Username</label>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating mt-2">
                                    <input type="password"
                                        class="form-control rounded-top @error('password') is-invalid @enderror"
                                        name="password" id="password" placeholder="Password" required
                                        value="{{ old('password') }}">
                                    <label for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col mt-2">
                                    <p class="text-end"><a href="/forget-password" style="color: #454555;"><b>Lupa kata
                                                Sandi?</b></a></p>
                                </div>
                                <div class="mb-3 col-sm-8 mt-5 mx-auto">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-login" type="submit"><b>Masuk</b></button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="mb-3 col-sm-8 mx-auto">
                            <p class="text-center" style="color: #454555;"><b> Baru di UMKM.IN ? </b><a href="/register"
                                    style="text-decoration: none; color: #A55659;"><b>Daftar</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
