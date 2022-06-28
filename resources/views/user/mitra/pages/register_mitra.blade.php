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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <title>Daftar Akun User UMKM.IN</title>
</head>

<style>
    .btn-regist-mitra {
        background-color: #2F3A70;
        border: none;
        transition: 0.2;
        color: #fff;
    }

    .btn-regist-mitra:hover {
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

            <div class="d-flex justify-content-center">
                <div class="kotak-registeractor2 mt-2">
                    <div class="container-medium mx-auto pt-2">
                        <h3 class="mt-2" style="text-align: center"><b>Daftar Sebagai Mitra</b></h3>
                        <form action="/regismitra" method="post">
                            @csrf
                            <input type="text" name="role" id="role" value="umkm" hidden>
                            <input type="text" name="status" id="status" value="active" hidden>
                            <table align="center">
                                <tr>
                                    <td style="width: 300px">
                                        <div class="form-floating px-1 py-1">
                                            <input type="text"
                                                class="form-control rounded-top @error('name') is-invalid @enderror"
                                                name="name" id="name" placeholder="Nama lengkap" required
                                                value="{{ old('nama') }}">
                                            <label for="name">Name</label>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td style="width: 300px">
                                        <div class=" form-floating px-1 py-1">
                                            <input type="text"
                                                class="form-control rounded-top @error('telp') is-invalid @enderror"
                                                name="telp" id="telp" placeholder="Telp" required
                                                value="{{ old('telp') }}">
                                            <label for="telp">Telp</label>
                                            @error('telp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td style="width: 300px">
                                        <div class="form-floating px-1 py-1">
                                            <select
                                                class="form-select rounded-top @error('business_sector') is-invalid @enderror"
                                                name="business_sector" id="business_sector">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->category_name }}">
                                                        {{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="business_sector">Sektor Bisnis</label>
                                            @error('business_sector')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-floating px-1 py-1">
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
                                    </td>
                                    <td>
                                        <div class="form-floating px-1 py-1">
                                            <input type="text"
                                                class="form-control rounded-top @error('address') is-invalid @enderror"
                                                name="address" id="address" placeholder="Alamat" required
                                                value="{{ old('address') }}">
                                            <label for="address">Alamat</label>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-floating px-1 py-1">
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
                                    </td>
                                    <td>
                                        <div class=" form-floating px-1 py-1">
                                            <input type="website"
                                                class="form-control rounded-top @error('website') is-invalid @enderror"
                                                name="website" id="website" placeholder="Website"
                                                value="{{ old('website') }}">
                                            <label for="website">Website</label>
                                            @error('website')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-floating px-1 py-1">
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
                                    </td>
                                    <td>
                                        <div class=" form-floating px-1 py-1">
                                            <input type="email"
                                                class="form-control rounded-top @error('email') is-invalid @enderror"
                                                name="email" id="email" placeholder="Email" required
                                                value="{{ old('email') }}">
                                            <label for="email">Email</label>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <div class=" form-floating mt-2">
                                <textarea class="form-control rounded-top @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Leave a comment here" id="desc" name="desc" style="height: 150px" required>{{ old('password_confirmation') }}</textarea>
                                <label for="desc">Deskripsi Umkm</label>
                                @error('desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-1 col-sm-10 mt-3 mx-auto">
                                <div class="d-grid gap-1 col-6 mx-auto">
                                    <button class="btn btn-regist-mitra" type="submit"><b>Buat Akun</b></button>
                                </div>
                            </div>
                        </form>
                        <div class="">
                            <p class="text-center"><b>Kembali ? </b><a href="/register"
                                    style="color: #A55659;"><b>Klik
                                        Disini</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
