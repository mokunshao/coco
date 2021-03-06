@extends('layouts.default')
@section('title','首页')

@section('content')
@auth
<div class="container">
    @include('articles._article_form')
    @include('shared._feed')
</div>
@endauth

@guest
<section class="hero is-medium is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                欢迎来到 COCO 微博客社区
            </h1>
            <h2 class="subtitle">
                你可以
                <a href="{{route('signup')}}">注册</a>
                或者
                <a href="{{route('login')}}">登录</a>
            </h2>
        </div>
    </div>
</section>
<div class="container">
    @include('shared._feed')
</div>
@endguest
@endsection