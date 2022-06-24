@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('status') && session('status') == 'user-updated')
        <script type='text/javascript'>
            Swal.fire({
                text: 'Profile User Berhasil Diubah',
                icon: 'success',
            })
        </script>
    @elseif (session()->has('status') && session('status') == 'umkm-updated')
        <script type='text/javascript'>
            Swal.fire({
                text: 'Profile UMKM Berhasil!!!',
                icon: 'success',
            })
        </script>
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        {{-- <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1> --}}
        <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
    </div>
    <div align="right">
        <a href="/" class="btn btn-danger"> <i data-feather="corner-up-left"></i> &nbsp;Kembali ke Menu Awal</a>
    </div>
    <br>
    @if ($umkm->foto != null)
        <img class="mt-3" src="{{ asset('storage/' . $umkm->foto->photo_name) }}" alt=""
            style="justify-content: center">
    @else
        <img class="mt-3" src="http://source.unsplash.com/300x200?company" alt="" style="justify-content: center">
    @endif
    <button class="btn text-white ms-5 editProfile" id="modalEditUmkm" data-bs-toggle="modal"
        data-id="{{ auth()->user()->id }}" data-bs-target="#exampleModalUmkm" style="background-color: #2F3A70;">Edit Profile</button>
    <div class="row mt-4 fs-5">
        <p class="col-2">Nama UMKM</p>
        <p class="col-9"> : {{ $umkm->name }}</p>

        <p class="col-2">Email UMKM</p>
        <p class="col-9"> : {{ $umkm->email }}</p>

        <p class="col-2">No Telp</p>
        <p class="col-9"> : {{ $umkm->telp }}</p>

        <p class="col-2">Alamat</p>
        <p class="col-9"> : {{ $umkm->address }}</p>

        <p class="col-2">Website</p>
        <p class="col-9"> : {{ $umkm->website }}</p>

        <p class="col-2">Sektor Bisnis</p>
        <p class="col-9"> : {{ $umkm->business_sector }}</p>

        <p class="col-2">Deskripsi UMKM</p>
        <p class="col-9"> : {{ $umkm->desc }}</p>

    </div>

    <div class="modal fade" id="exampleModalUmkm" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/update" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" class="form-control" id="id_umkm" name="id_umkm"
                            value="{{ $umkms->id }}">
                        <input type="text" class="form-control" id="photo_id" name="photo_id"
                            value="{{ $umkm->photo_id }}" hidden>
                        <input type="text" class="form-control" id="role" name="role"
                            value="{{ $umkm->role }}" hidden>
                        <div class="modal-body">
                            <div class="">
                                <label for="name" class="col-form-label">Nama Umkm</label>
                                <input type="text" class="form-control" id="name" name="name" value=""
                                    required>
                            </div>
                            <div class="">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value=""
                                    required>
                            </div>
                            <div class="">
                                <label for="telp" class="col-form-label">No Telp</label>
                                <input type="text" class="form-control" id="telp" name="telp" value=""
                                    required>
                            </div>
                            <div class="">
                                <label for="address" class="col-form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="address" value=""
                                    required>
                            </div>
                            <div class="">
                                <label for="website" class="col-form-label">Website</label>
                                <input type="text" class="form-control" id="website" name="website" value=""
                                    required>
                            </div>
                            <div class="">
                                <label for="business_sector" class="col-form-label">Sektor Bisnis</label>
                                <input type="text" class="form-control" id="business_sector" name="business_sector"
                                    value="" required>
                            </div>
                            <div>
                                <label for="photo_name" class="form-label">Gambar Produk</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input class="form-control @error('photo_name') is-invalid @enderror" type="file"
                                    id="photo_name" name="photo_name" onchange="previewImage()">
                                @error('photo_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    <script type='text/javascript'>
                                        Swal.fire({
                                            text: 'Ukuran gambar max 1024 kilobytes',
                                            icon: 'warning',
                                        })
                                    </script>
                                @enderror
                            </div>
                            <div class="">
                                <label for="desc" class="form-label mt-1">Deskripsi Produk</label>
                                <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn text-white" style="background-color: #2F3A70;">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        const title = document.querySelector('#prod_name');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?prod_name=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });


        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#photo_name');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
