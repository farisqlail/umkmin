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
                        @if (!empty($dataAppoiments))
                            @foreach ($dataAppoiments as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $company[0]['website'] }}</td>
                                    <td>{{ $item->prod_title }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->time1 }} - {{ $item->time2 }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
