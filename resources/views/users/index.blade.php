@extends('layouts.default')
@section('title','所有用户')

@section('content')
<h1>所有用户</h1>
@foreach ($users as $user)
<div>
    <span>{{$user->name}}</span>
    <a href="{{route('users.show',$user)}}">link</a>
</div>
@endforeach
@endsection
