@extends('layouts.default')

@section('content')
<div class="container">
  @include('articles._article', $article)
  @include('comments._comment_form')
  <div>
    <h2 class="title">评论：</h2>
    @if ($comments->count()>0)
    @foreach ($comments as $comment)
    @include('comments._comment')
    @endforeach
    {{$comments->links()}}
    @else
    <div>还没有人评论过。</div>
    @endif
  </div>
</div>
@endsection