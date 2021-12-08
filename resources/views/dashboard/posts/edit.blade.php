@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Artikel</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/posts/{{ $post->id }}" enctype="multipart/form-data" class="mb-5">
      @method('put')
      @csrf
      <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" required autofocus value="{{ old('judul', $post->judul) }}">
        @error('judul')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
        <input name="slug" type="text" class="form-control" id="slug" required value="{{ old('slug', $post->slug) }}">
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="category" class="form-label">Kategori artikel</label>
        <select class="form-select" name="category_id">
          @foreach($categories as $category)
            @if(old('category_id', $post->category_id) == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->nama }}</option>  
            @endif
          @endforeach
        </select>      
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="hidden" name="oldImage" value="{{ $post->image }}">
        @if($post->image)
        <img src="{{ asset('storage/'.$post->image) }}" class="d-block img-fluid mb-3 col-sm-5">
        @endif
        <input class="@error('image') is-invalid @enderror form-control" type="file" id="image" name="image">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="body" class="form-label">Isi artikel</label>
        @error('body')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
        <trix-editor input="body"></trix-editor>    
      </div>

      <button type="submit" class="btn btn-primary">Edit Artikel</button>
    </form>
</div>
<script>
  const judul = document.querySelector('#judul');
  const slug = document.querySelector('#slug');

  judul.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?judul=' + judul.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  });
</script>
@endsection