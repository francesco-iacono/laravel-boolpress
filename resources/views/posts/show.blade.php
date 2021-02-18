@extends('layouts.app')

@section('main')
<div class="container">
  <h1 class="mt-5">Dettaglio post {{ $post->title }}</h1>
  <p><strong>Post status:</strong> {{ $post->infoPost->post_status }}</p>
  <p><strong>Comment status:</strong> {{ $post->infoPost->comment_status }}</p>
  <table class="table table-light table-striped table-bordered">
    @foreach ($post->getAttributes() as $key => $value)
    <tr>
      <td><strong>{{ $key }}</strong></td>
      <td>{{ $value }}</td>
    </tr>
        
    @endforeach
  </table>
  <div class="text-right">
    <a href="{{ route('posts.index') }}" class="btn btn-lg btn-primary">Torna ai post</a>
  </div>
</div>
@endsection