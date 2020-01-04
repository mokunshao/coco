@extends('layouts.default')
@section('title',$title)

@section('content')
<div class="container">
  <h1 class="title">{{$title}}</h1>
  @foreach ($users as $user)
  @include('users._user')
  @endforeach
  {{$users->links()}}
</div>
@endsection