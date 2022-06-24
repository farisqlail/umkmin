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

    <div class="card shadow rounded" style="border: none;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="tableEmail">
                    <thead>
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
                                <div class="modal fade" id="exampleModalUpdate" data-id="{{ $mail->id }}" tabindex="-1" aria-labelledby="judulModal"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="judulModal">Alasan penolakan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/dashboard/mailR/{{ $mail->id }}" method="get"
                                                    enctype="multipart/form-data">
                                                    {{-- @method('put') --}}
                                                    @csrf
                                                    <input type="text" class="form-control" id="id" name="id"
                                                        value="" hidden>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="category_name2" class="col-form-label">Tulis
                                                                alasan</label>
                                                            {{-- <input type="text" class="form-control" id="rejected" name="rejected"
                          value="" required> --}}
                                                            <textarea class="form-control" placeholder="*karena ada acara ..." id="rejected" name="rejected" style="height: 100px"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn text-white"
                                                            style="background-color: #2F3A70;">Kirim</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mail->from_email }}</td>
                                    <td>{{ $mail->date }}</td>
                                    <td>{{ $mail->time1 }}</td>
                                    <td>{{ $mail->time2 }}</td>
                                    <td>{{ $mail->subject }}</td>
                                    <td style="text-align: justify">{{ $mail->desc }}</td>
                                    <td class="text-center">
                                        <a href="/dashboard/mailA/{{ $mail->id }}" class="badge bg-success"><span
                                                data-feather="check"></span></a>
                                        <a href="" class="badge bg-danger rejected" id="modalRejectedMail"
                                            data-bs-toggle="modal" data-id="{{ $mail->id }}"
                                            data-bs-target="#exampleModalUpdate"><span data-feather="x-circle"></span></a>
                                        {{-- <a href="/dashboard/mailR/{{ $mail->id }}" class="badge bg-danger"><span
                                                data-feather="x-circle"></span></a> --}}
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
        </div>
    </div>



@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tableEmail').DataTable();
        });
    </script>
@endpush
