@extends('layouts.default')
@section('title', $user->name)

@section('content')
@include('shared._user_info',['user'=>$user])

@if ($articles->count()>0)
@foreach ($articles as $article)
@include('articles._article')
@endforeach
@else
<p>没有数据</p>
@endif

@endsection