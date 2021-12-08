@extends('layouts/main')
@section('container')

    <h2 class="mb-5">List Kategori</h2>
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-4 mb-5">
            <a href="/posts?category={{ $category->slug }}">
                <div class="card bg-dark text-white">
                    <img src="https://source.unsplash.com/500x400?{{ $category->nama }}" class="card-img" alt="{{ $category->nama }}">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title flex-fill p-4 text-center fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->nama }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

@endsection
