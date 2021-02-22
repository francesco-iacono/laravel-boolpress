@extends('layouts.app')

@section('main')
  <div class="container index-posts">
    <h1 class="mt-5">Posts</h1>

    @if (session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>   
    @endif
  
    <table class="table table-light table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Titolo</th>
          <th>Slug</th>
          <th>Sottotitolo</th>
          <th>Autore</th>
          <th>Testo</th>
          <th>Immagine</th>
          <th>Pubblicazione</th>
          <th>Created_at</th>
          <th>Updated_at</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ substr($post->title, 0, 30) }}</td>
            <td>{{ substr($post->slug, 0, 30) }}</td>
            <td>{{ substr($post->subtitle, 0, 30) }}</td>
            <td>{{ $post->author }}</td>
            <td>{{ substr($post->text, 0, 30) }}</td>
            <td>  
              <img src="{{ $post->img_path }}" alt="{{ $post->title }}">
            </td>
            <td>{{ $post->publication_date }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
            <td>
              <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-dark"> <i class="fas fa-search-plus"></i></a>
            </td>
            <td>
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-dark"> <i class="fas fa-pen"></i> </a>
            </td>
            <td>
              <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-dark">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table> 
    <div class="text-right">
      <a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary">Nuovo Post</a>
    </div>   
  </div> 
@endsection