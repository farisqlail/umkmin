{{-- @extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Email yang Masuk, {{ auth()->user()->name }}</h1>
  </div>

  @if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Dari</th>
          <th scope="col">Mengenai</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($emails as $mail)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $mail->from_email }}</td>
          <td>{{ $mail->subject }}</td>
          <td>
                <a href="/dashboard/mailA/{{ $mail->id }}" class="badge bg-success"><span data-feather="check"></span></a>
                <a href="/dashboard/mailR/{{ $mail->id }}" class="badge bg-danger"><span data-feather="x-circle"></span></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection --}}

@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Email yang Masuk, {{ auth()->user()->name }}</h1>
  </div>

  @if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <div class="table-responsive col-lg-12">
    <table class="table table-striped table-sm" border="2">
      <thead>
        {{-- <tr>
          <th class="text-center d-flex justify-content-center" rowspan="2" scope="col">#</th>
          <th class="text-center" colspan="4" scope="col">Informasi</th>
          <th class="text-center" colspan="2" scope="col">Mengenai</th>
          <th class="text-center d-flex justify-content-center" rowspan="2" scope="col">Aksi</th>
        </tr> --}}
        <tr>
          <th scope="col">#</th>
          <th scope="col">Email Dari</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Mulai Pukul</th>
          <th scope="col">Selesai Pukul</th>
          <th scope="col">Tentang</th>
          <th class="col-lg-4" scope="col">Deskripsi</th>
          <th class="text-center" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @if ($emails->count())
          @foreach ($emails as $mail)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $mail->from_email }}</td>
            <td>{{ $mail->date }}</td>
            <td>{{ $mail->time1 }}</td>
            <td>{{ $mail->time2 }}</td>
            <td>{{ $mail->subject }}</td>
            <td style="text-align: justify">{{ $mail->desc }}</td>
            <td class="text-center">
                  <a href="/dashboard/mailA/{{ $mail->id }}" class="badge bg-success"><span data-feather="check"></span></a>
                  <a href="/dashboard/mailR/{{ $mail->id }}" class="badge bg-danger"><span data-feather="x-circle"></span></a>
            </td>
          </tr>
          @endforeach
        @else
          <tr class="text-center">
            <td colspan="12">Email Tidak Ditemukan.</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
@endsection