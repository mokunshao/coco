@extends('layouts.default')
@section('title','所有用户')

@section('content')
<h1 class="title">所有用户</h1>
@foreach ($users as $user)
@include('users._user')
@endforeach
<nav class="pagination" role="navigation" aria-label="pagination">
  {{$users->links()}}
</nav>
@endsection