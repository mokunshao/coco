@extends('layouts.default')
@section('title', $user->name)

@section('content')
<div>{{$user->name}} - {{$user->email}}</div>
@endsection
