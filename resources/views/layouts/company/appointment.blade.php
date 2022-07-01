@extends('layouts.company.main')

@section('body')

@if (session()->has('status') && session('status') == "appointment-send")
<script type='text/javascript'> 
      Swal.fire({
        text: 'Pesan Berhasil Dikirim',
        icon: 'success',
        })
</script>
@elseif (session()->has('status') && session('status') == "appointment-failed")
<script type='text/javascript'> 
Swal.fire({
        text: 'Anda Harus Login Terlebih Dahulu!!!',
        icon: 'error',
        })
</script>
@endif  

<div class="row mt-5 ms-5 me-5">
    <div class="col">
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link text-dark" aria-current="page" href="/profile/{{ $umkm->name }}">Gambaran</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="/catalogs/{{ $umkm->name }}">Katalog Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark active" href="/appointment/{{ $umkm->name }}">Buat Janji</a>
            </li>
          </ul>
    </div>
</div>

    <div class="row ms-5 mt-5 me-5">
        <div class="col">
            <h4>Buat Janji</h4>
            <div class="row mt-3 justify-content-center">
                <div class="card" style="width: 65rem; height: 38rem">
                    <div class="card-body px-4 py-5">
                        <div class="row">
                            <form action="/sendemail">
                                @csrf
                                @foreach($products as $item)
                                    <input type="text" name="id_product" id="id_product" value="{{ $item->id }}" hidden>
                                    <input type="text" name="id_user" id="id_user" value="{{ $item->user_id }}" hidden>
                                    <input type="text" name="to_email" id="to_email" value="{{ $item->email }}" hidden>
                                @endforeach
                                @if (auth()->user())
                                <input type="text" name="from_email" id="from_email" value="{{ auth()->user()->email }}" hidden>
                                @else
                                {{ session()->has('danger') }}
                                @endif
                            <h6>Silakan masukan biodata anda</h6>
                            <table>
                                <tr>
                                    <td>
                                        <div class="mb-3 me-3 ms-2">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                                          </div>
                                    </td>
                                    
                                    <td>
                                        <div class="mb-3 me-3 ms-2">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" required>
                                          </div>
                                    </td>
                                    <td>
                                        <div class="mb-3 ms-2 me-2">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="No. Hp" required>
                                          </div>
                                    </td>
                                </tr>
                            </table>

                            <h6>Silakan masukan detail rapat</h6>
                            <table>
                                <tr>
                                    
                                    <td>
                                        <div class="mb-3 me-3 ms-2">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Perihal" required>
                                          </div>
                                    </td>
                                    <td>
                                        <div class="mb-3 me-3 ms-2">
                                            <input type="date" class="form-control" id="date" name="date" placeholder="Tanggal" required>
                                          </div>
                                    </td>
                                    <td>
                                        <div class="mb-3 ms-3 me-2">
                                            <input type="time" class="form-control" id="time1" name="time1" placeholder="Jangka Waktu 1" required>
                                          </div>
                                    </td>
                                    <td class="d-flex align-content-center ms-2" style="margin-top: 5px">sampai</td>
                                    <td>
                                        <div class="mb-3 ms-3 me-2">
                                            <input type="time" class="form-control" id="time2" name="time2" placeholder="Jangka Waktu 2" required>
                                          </div>
                                    </td>
                                </tr>
                            </table>

                            <h6>Silakan masukan pesan anda</h6>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="desc" name="desc" style="height: 150px" required></textarea>
                              </div>
                        </div>
                        
                        <div class="d-flex justify-content-center mb-4 mt-4">
                            <button class="btn" style="background-color: #2F3A70; color: #fff;" type="submit">Kirim Pesan</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script>

    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    });

</script>

@endsection