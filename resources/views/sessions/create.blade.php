@extends('layouts.default')

@section('title','登录')

@section('content')
@include('shared._errors')
<div class="container">
    <div>登录</div>
    <form action="{{route('login')}}" method="post">
        @csrf
        <div>
            <label for="email">邮箱</label>
            <input id="email" type="text" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label for="password">密码</label>
            <input id="password" type="password" name="password">
        </div>
        <div>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">记住我</label>
        </div>
        <button type="submit">登录</button>
    </form>
    <div>没有注册？<a href="{{route('signup')}}">现在注册</a></div>
    <div>忘记密码？<a href="{{route('password.request')}}">现在找回</a></div>
</div>
@endsection