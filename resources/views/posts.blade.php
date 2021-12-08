@extends('layouts/main')
@section('container')

    @if(request('category'))
      <h2 class="mb-3 text-center">Daftar Artikel Kategori {{ $posts[0]->category->nama }}</h2>
    @else
      <h2 class="mb-3 text-center">Daftar Artikel</h2>
    @endif
    

    <div class="row justify-content-center mb-3">
      <div class="col-md-6">
        <form action="/posts">
          @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          <div class="input-group mb-3">
            <input value="{{ request('search') }}" type="text" class="form-control" placeholder="Search" name="search">
            <button class="btn btn-dark" type="submti">Search</button>
          </div>
        </form>
      </div>
    </div>

    @if($posts->count())
      <div class="card mb-3">
        @if($posts[0]->image)
          <div class="d-flex justify-content-center"" style="max-height: auto; overflow: hidden;">
            <img class="card-img-top" src="{{ asset('storage/'.$posts[0]->image) }}" alt="{{ $posts[0]->category->nama }}">
          </div>
        @else     
          <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->nama }}" class="card-img-top" alt="...">
        @endif
        <div class="card-body text-center">
          <h3 class="card-title"> {{ $posts[0]->judul }} </h3>
          <p>
            <small class="text-muted">
              By. {{ $posts[0]->user->name }} in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->nama }}</a> {{ $posts[0]->created_at->diffForHumans() }}
            </small>
          </p>
          <p class="card-text">{{ $posts[0]->excerpt }}</p>
          <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
        </div>
      </div>

    
      <div class="container">
        <div class="row">
          @foreach ($posts->skip(1) as $post)
            <div class="col-4 mb-4">
              <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0,0,0,0.6)"><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->nama }}</a></div>
                @if($post->image)
                    <img class="card-img-top" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->nama }}">
                @else     
                  <img src="https://source.unsplash.com/500x400?{{ $post->category->nama }}" class="card-img-top" alt="{{ $post->category->nama }}">
                @endif
                <div class="card-body">
                  <h5 class="card-title"> <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->judul }}</a> </h5>
                  <p>
                    <small class="text-muted">
                      By. {{ $post->user->name }} {{ $post->created_at->diffForHumans() }}
                    </small>
                  </p>
                  <p class="card-text">{{ $post->excerpt }}</p>
                  <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

    @else
      <p class="text-center fs-4">No posts.</p>
    @endif
    <div class="d-flex justify-content-center">
      {{ $posts->links() }}
    </div>
@endsection
