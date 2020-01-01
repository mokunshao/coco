@extends('layouts.default')
@section('title','首页')

@section('content')
@if (Auth::check())
<div>
    @include('activities._activity_form')
    @include('shared._user_info',['user'=>Auth::user()])
    @include('shared._feed')
</div>
@else
<div>
    <p>欢迎来到 coco 微博客社区</p>
    <p>你可以注册或者登录</p>
</div>
@endif
@endsection