@extends('dashboard.layouts.main')
@section('container')

<div class="row">
    <div class="col-lg-8">
        <h1 class="my-3"> {{ $post->judul }} </h1>
        <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left-circle"></span>Back</a>
        <a href="/dashboard/posts/{{ $post->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>
        <form class="d-inline" action="/dashboard/posts/{{ $post->id }}" method="post">
            @method('delete')
            @csrf
            <button onclick="return confirm('Apakah anda yakin ingin menghapus ?')" class="btn btn-danger"><span data-feather="trash-2"></span>Hapus</button>
        </form>  
        @if($post->image)
            <div style="max-height: auto; overflow: hidden;">
                <img class="img-fluid mt-3" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->nama }}">
            </div>
        @else     
            <img class="img-fluid mt-3" src="https://source.unsplash.com/1200x400?{{ $post->category->nama }}" alt="{{ $post->category->nama }}">
        @endif
        <article class="my-3 fs-5">
            {!! $post->body !!} 
        </article>
    </div>
</div>

@endsection