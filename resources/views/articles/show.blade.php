@extends('layouts.default')

@section('content')
<div class="container">
  @include('articles._article', $article)
  @include('comments._comments_form')
  <ul>
    @foreach ($article->comments as $comment)
    <li>{{$comment->user->name}} : {{$comment->content}} - {{$comment->created_at->diffForHumans()}}</li>
    @endforeach
  </ul>
</div>
@endsection