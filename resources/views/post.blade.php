@extends('layouts.app')


@section('main')
  <div class="container show-blog ">
    <section id='article'>
      <div class="text-center">
        <img src="{{ $post->img_path }}" alt="{{ $post->title }}" class="p-5">
        <h1>{{ $post->title }}</h1>
        <h3>{{ $post->subtitle }}</h3>
        <small>{{ $post->author }} - {{ $post->publication_date }}</small>
        <div class="p-3">
          @foreach ($post->tags as $tag)
            <span class="badge badge-info">{{ $tag->name }}</span>
          @endforeach
        </div>
      </div>
      <div>
        {{ $post->text }}
      </div>
      <div class="container my-3">
        <div class="row justify-content-center">
          @foreach ($post->images as $image)
            <div class="col-4">
              <figure>
                <img src="{{ $image->link }}" alt="{{ $image->alt }}"
                class="img-fluid">
                <figcaption>{{ $image->caption }}</figcaption>
              </figure>
            </div>
          @endforeach
        </div>
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
    @endif

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
        <input type="submit" value="Invia" class="btn btn-secondary my-3">
        <a href="{{ route('blog') }}" class="btn btn-primary">Torna al blog</a>
      </form>
    </section>

  </div>
@endsection