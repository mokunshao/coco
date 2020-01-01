@extends('layouts.default')
@section('title', $user->name)

@section('content')
@include('shared._user_info',['user'=>$user])

@if ($activities->count()>0)
@foreach ($activities as $activity)
@include('activities._activity')
@endforeach
@else
<p>没有数据</p>
@endif

@endsection