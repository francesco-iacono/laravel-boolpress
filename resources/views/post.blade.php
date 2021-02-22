@extends('layouts.app')

@section('main')
  <div class="container">
    <section id='article'>
      <div class="text-center">
        <img src="{{ $post->img_path }}" alt="{{ $post->title }}">
        <h1>{{ $post->title }}</h1>
        <h3>{{ $post->subtitle }}</h3>
        <small>{{ $post->author }} - {{ $post->publication_date }}</small>
      </div>
      <div>
        {{ $post->text }}
      </div>
    </section>
    @if ($post->infoPost->comment_status == 'open')
      <section id="comments" class="my-4">
        @foreach ($post->comments as $comment)
          <div>
            <small>{{ $comment->author }} - {{ $comment->created_at }}</small>
            <p>{{ $comment->text }}</p>
          </div>
        @endforeach
      </section>

      <section id="form">
        <form action="{{ route('add-comment', $post->id) }}" method="POST">
          @method('POST')
          @csrf
          <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Scrivi qui il tuo nome" value="">
          </div>
          <div class="form-group">
            <label for="text">Testo</label>
            <textarea name="text" class="form-control" id="text" cols="30" rows="6" placeholder="Scrivi il tuo commento"></textarea>
          </div>
          <input type="submit" value="Invia" class="btn btn-secondary">
        </form>
      </section>
    @endif
  </div>
@endsection