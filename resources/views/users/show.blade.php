@extends('layouts.default')
@section('title', $user->name)

@section('content')
<div class="container">
  @include('shared._user_info',$user)

  @if ($articles->count()>0)
  @foreach ($articles as $article)
  @include('articles._article')
  @endforeach
  {{$articles->links()}}
  @else
  <p>没有数据</p>
  @endif
</div>

@endsection