@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
      <div class="col-lg-8">
        <h1 class="mb-3">{{ $product->prod_title }}</h1>
    
        <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my posts</a>
        <a href="/dashboard/posts/{{ $product->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
        <form action="/dashboard/posts/{{ $product->slug }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="btn btn-danger" onclick="return confirm('Yakin hapus?')"><span data-feather="x-circle"></span> Delete</button>
        </form>

        @if ($product->photo->photo_name )
        <div style="max-height: 350px; overflow:hidden"> 
          
        <img src="{{ asset('storage/' . $product->photo->photo_name) }}" alt="{{ $product->category->category_name }}" class="img-fluid mt-3">
        </div>
        @else
        <img src="http://source.unsplash.com/1200x400?{{ $product->category->category_name }}" alt="{{ $product->category->category_name }}" class="img-fluid mt-3">
        @endif
        
        

        <article class="my-3 fs-5">
          {!! $product->prod_desc !!}
        </article>

      
      </div>
    </div>
  </div>    
@endsection