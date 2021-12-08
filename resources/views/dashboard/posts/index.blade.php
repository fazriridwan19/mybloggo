@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My posts</h1>
</div>
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="table-responsive col-lg-8">
      <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Kategori</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->judul }}</td>
            <td>{{ $post->category->nama }}</td>
            <td>
              <a href="/dashboard/posts/{{ $post->id }}" class="badge bg-info"><span data-feather="eye"></a>
              <a href="/dashboard/posts/{{ $post->id }}/edit" class="badge bg-warning"><span data-feather="edit"></a>
              <form class="d-inline" action="/dashboard/posts/{{ $post->id }}" method="post">
                @method('delete')
                @csrf
                <button onclick="return confirm('Apakah anda yakin ingin menghapus ?')" class="badge bg-danger border-0"><span data-feather="trash-2"></span></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection