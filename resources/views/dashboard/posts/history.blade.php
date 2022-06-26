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
                      <h4>Table History</h4>
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
                            <th scope="col">Perusahaan</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Pembeli</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->website }}</td>
                                <td>{{ $item->prod_title }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->time1 }} - {{ $item->time2 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
