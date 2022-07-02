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
                            <th scope="col">Product</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Mulai Pukul</th>
                            <th scope="col">Selesai Pukul</th>
                            <th scope="col">Tentang</th>
                            <th     scope="col">Deskripsi</th>
                            <th class="text-center" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($emails))
                            @foreach ($emails as $mail)
                                <div class="modal fade" id="exampleModalUpdate{{ $mail->id }}" tabindex="-1" aria-labelledby="judulModal"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="judulModal">Alasan penolakan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/dashboard/mailR', $mail->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    {{ method_field('PATCH') }}
                                                    @csrf
                                                    <input type="text" class="form-control" id="id" name="id"
                                                        value="" hidden>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="category_name2" class="col-form-label">Tulis
                                                                alasan</label>
                                                            <textarea class="form-control" placeholder="*karena ada acara ..." id="reason" name="reason" style="height: 100px"></textarea>
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
                                    <!-- @foreach($products as $data) -->
                                    <td>{{ $products[0]['prod_title'] }}</td>
                                    <!-- @endforeach -->
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
                                            data-bs-target="#exampleModalUpdate{{ $mail->id }}"><span data-feather="x-circle"></span></a>
                                       
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
