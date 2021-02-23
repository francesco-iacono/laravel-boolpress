@extends('layouts.app')

@section('main')
  <div class="container">
    <div class="row">

      @foreach ($posts as $post)

        <div class="col-4 my-3 d-flex align-content-stretch">
          <div class="card">
            <img class="card-img-top" src="{{ $post->img_path }}" alt="{{ $post->title }}">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <div class="text-left my-3">
                @foreach ($post->tags as $tag)
                  <span class="badge badge-info">{{ $tag->name }}</span>
                @endforeach
              </div>
              <a href="{{ route('post', $post->slug) }}" class="btn btn-primary">Leggi</a>
            </div>
          </div>
        </div>
          
      @endforeach

    </div>
  </div>
@endsection