@extends('layouts.default')
@section('title','所有用户')

@section('content')
<div class="container">
  <h1 class="title">所有用户</h1>
  @foreach ($users as $user)
  @include('users._user')
  @endforeach
  {{$users->links()}}
</div>
@endsection