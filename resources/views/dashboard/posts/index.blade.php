@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produk Saya, {{ auth()->user()->name }}</h1>
  </div>

  @if (session()->has('status') && session('status') == "product-created")
        <script type='text/javascript'> 
              Swal.fire({
                text: 'Produk Berhasil Ditambahkan',
                icon: 'success',
                })
        </script>
    @elseif (session()->has('status') && session('status') == "product-updated")
    <script type='text/javascript'> 
        Swal.fire({
                text: 'Produk Berhasil Diubah',
                icon: 'success',
                })
    </script>
    @elseif (session()->has('status') && session('status') == "product-destroy")
    <script type='text/javascript'> 
        Swal.fire({
                text: 'Produk Berhasil Dihapus',
                icon: 'success',
                })
    </script>
    @endif  

  <div class="table-responsive col-lg-8">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Buat produk baru</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Kategori</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $prod)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $prod->prod_name }}</td>
          <td>{{ $prod->category->category_name }}</td>
          <td>
              <a href="/dashboard/posts/{{ $prod->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
              <a href="/dashboard/posts/{{ $prod->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/posts/{{ $prod->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Yakin hapus?')"><span data-feather="x-circle"></span></button>
              </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection