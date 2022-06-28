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
    <link rel="stylesheet" href="{{ asset('./css/app.css') }}">

    <title>Daftar Akun User UMKM.IN</title>
</head>
<style>
    .btn-regist-pengguna {
        background-color: #2F3A70;
        border: none;
        transition: 0.2;
        color: #fff;
    }

    .btn-regist-pengguna:hover {
        border: 2px #2F3A70 solid;
        color: #2F3A70;
    }
</style>

<body>
    @if (session()->has('danger'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('danger') }}
        </div>
    @endif
    <div class="container">
        <div class="img-umkm d-flex justify-content-center">
            <img src="{{ asset('/assets/Logo/UMKM.png') }}" alt="" srcset="" class="mt-3">
        </div>
        <div class="row">
            <div class="col">
                <div class="img-register-actor">
                    <img src="{{ asset('/assets/Register/image 1.png') }}" alt="" srcset=""
                        class="mt-5">
                </div>
                <h3 class="mt-5 text-end"><b>Mari Bergabung Bersama UMKM.IN Untuk Kemajuan Bisnis Anda</b></h3>
            </div>
            <div class="col-1">
                <div class="garis mt-5"></div>
            </div>
            <div class="col">
                <div class="kotak-registeractor mt-5">
                    <div class="container-medium mx-auto pt-4">
                        <h3 class="mt-2"><b>Daftar Sebagai Pengguna</b></h3>
                        <form action="/regisuser" method="post">
                            @csrf
                            <input type="text" name="role" id="role" value="user" hidden>
                            <input type="text" name="status" id="status" value="active" hidden>
                            <div class="form-floating mt-2">
                                <input type="text"
                                    class="form-control rounded-top @error('name') is-invalid @enderror" name="name"
                                    id="name" placeholder="Nama lengkap" required value="{{ old('nama') }}">
                                <label for="name">Name</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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
                                <input type="email"
                                    class="form-control rounded-top @error('email') is-invalid @enderror" name="email"
                                    id="email" placeholder="Email" required value="{{ old('email') }}">
                                <label for="email">Email</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="password"
                                    class="form-control rounded-top @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Kata sandi" required
                                    value="{{ old('password') }}">
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="password"
                                    class="form-control rounded-top @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" id="password_confirmation"
                                    placeholder="Konfirmasi kata sandi" required
                                    value="{{ old('password_confirmation') }}">
                                <label for="name">Konfirmasi password</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-10 mt-3 mx-auto">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-regist-pengguna" type="submit"><b>Buat Akun</b></button>
                                </div>
                            </div>
                        </form>
                        <div class="mb-3 col-sm-8 mx-auto">
                            <p class="text-center"><b>Kembali ? </b><a href="/register" style="color: #A55659;"><b>Klik
                                        Disini</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
