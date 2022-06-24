@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex  flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hai Admin</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @elseif (session()->has('danger'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('danger') }}
        </div>
    @endif

    <div class="card shadow rounded" style="border:none;">
        <div class="card-body">
            <div class="table-responsive">
                <div class="row mb-4">
                    <div class="col-md-6">
                      <h4>Table Kategori</h4>
                    </div>
                    <div class="col-md-6" align="right">
                        <button type="button" class="btn" style="background-color: #2F3A70; color: #fff;" data-bs-toggle="modal"
                            data-bs-target="#exampleModalCreate" data-bs-whatever="@mdo">Tambah Kategori Baru</button>
                    </div>
                </div>
                <table class="table" id="tableKategori">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="" class="badge bg-warning editCategory" id="modalEditCategory"
                                        data-bs-toggle="modal" data-id="{{ $category->id }}"
                                        data-bs-target="#exampleModalUpdate"><span data-feather="edit"></span></a>
                                    <form action="/manajemen/categories/{{ $category->id }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Yakin hapus?')"><span
                                                data-feather="x-circle"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- create --}}
    <div class="modal fade" id="exampleModalCreate" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Buat Kategori Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/manajemen/new_category" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="category_name" class="col-form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="category_name" name="category_name"
                                    value="" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn text-white" style="background-color: #2F3A70;">Buat Kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalUpdate" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Ubah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/ubahCategories" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="text" class="form-control" id="id" name="id" value="" hidden>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="category_name2" class="col-form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="category_name2" name="category_name2"
                                    value="" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn text-white" style="background-color: #2F3A70;">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tableKategori').DataTable();
        });
    </script>
@endpush
