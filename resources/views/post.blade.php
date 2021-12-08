
@extends('layouts/main')
@section('container')

<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="mb-4"> {{ $post->judul }} </h1>
        <p>By. {{ $post->user->name }} in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->nama }}</a></p>
        @if($post ->image)
          <div class="d-flex justify-content-center"" style="max-height: auto; overflow: hidden;">
            <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->nama }}">
          </div>
        @else     
          <img class="img-fluid" src="https://source.unsplash.com/1200x400?{{ $post->category->nama }}" alt="{{ $post->category->nama }}">
        @endif
        <article class="my-3 fs-5">
            {!! $post->body !!} 
        </article>

        <a href="/posts" class="btn btn-primary my-3" type="submit">Kembali ke Post</a>
    </div>
</div>

@endsection