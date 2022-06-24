@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Produk</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/posts/{{ $product->slug }}" method="post"  class="mb-5" enctype="multipart/form-data">
      @method('put')
        @csrf
        <div class="mb-3">
            <label for="prod_title" class="form-label">Judul Produk</label>
            <input type="text" class="form-control @error('prod_title') is-invalid @enderror" id="prod_title"
                name="prod_title" required autofocus value="{{ old('prod_title', $product->prod_title) }}">
            @error('prod_title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="prod_name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('prod_name') is-invalid @enderror" id="prod_name"
                name="prod_name" required autofocus value="{{ old('prod_name', $product->prod_name) }}">
            @error('prod_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required readonly
                value="{{ old('slug', $product->slug) }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori Produk</label>
            <select class="form-select" id="category_id" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
       
            
        <div class="mb-3">
          <label for="photo_name" class="form-label">Gambar Produk</label>
          <input type="hidden" name="oldImage" id="" value="{{ $product->photo->photo_name }}">
          @if ($product->photo->photo_name)
          <img src="{{ asset('storage/' . $product->photo->photo_name) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
          @else
          <img class="img-preview img-fluid mb-3 col-sm-5">
          @endif
          
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('photo_name') is-invalid @enderror" type="file" id="photo_name" name="photo_name" onchange="previewImage()">
          @error('photo_name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="prod_desc" class="form-label">Deskripsi Produk</label>
            @error('prod_desc')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="prod_desc" type="hidden" name="prod_desc" value="{{ old('prod_desc', $product->prod_desc) }}">
            <trix-editor input="prod_desc"></trix-editor>
        </div>

        <button type="submit" class="btn text-white" style="background-color: #00B38A;">Upload Produk</button>
    </form>
</div>


<script>
    const title = document.querySelector('#prod_name');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function () {
        fetch('/dashboard/posts/checkSlug?prod_name=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });


    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    });

    function previewImage() {
        const image = document.querySelector('#photo_name');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection