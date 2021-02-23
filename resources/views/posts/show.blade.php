@extends('layouts.app')

@section('main')
<div class="container">
  <h1 class="mt-5">Dettaglio post: <span class="text-secondary"> {{ $post->title }}</span></h1>
  <p><strong>Post status:</strong> <span class="badge badge-success"> {{ $post->infoPost->post_status }}</span></p>
  <p><strong>Comment status:</strong><span class="badge badge-success"> {{ $post->infoPost->comment_status }}</span></p>
  <div> <span> <strong>Tags: </strong> </span>
    @foreach ($post->tags as $tag)
      <span class="badge badge-info">{{ $tag->name }}</span>
    @endforeach
  </div>
  <table class="table table-light table-striped table-bordered">
    @foreach ($post->getAttributes() as $key => $value)
    <tr>
      <td><strong>{{ $key }}</strong></td>
      <td>{{ $value }}</td>
    </tr>
    @endforeach
  </table>
  <h3>Commenti</h3>
  <table class="table table-light table-striped table-bordered">
    @foreach ($post->comments as $comment)
      <tr>
        <td><strong>{{ $comment->author }}</strong></td>
        <td>{{ $comment->text }}</td>
      </tr>  
    @endforeach
  </table>
  <div class="text-right">
    <a href="{{ route('posts.index') }}" class="btn btn-lg btn-primary">Torna ai post</a>
  </div>
</div>
@endsection