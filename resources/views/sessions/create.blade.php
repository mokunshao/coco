@extends('layouts.default')

@section('title','登录')

@section('content')
@include('shared._errors')
<div class="container">
    <h1 class="title">登录</h1>
    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="field">
            <label class="label">邮箱</label>
            <div class="control">
                <input class="input" type="email" name="email" value="{{ old('email') }}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">密码</label>
            <div class="control">
                <input class="input" type="password" name="password" required>
            </div>
        </div>
        <div>
            <label class="checkbox">
                <input type="checkbox" name="remember">
                记住我
            </label>
        </div>
        <button class="button is-primary" type="submit">登录</button>
    </form>
    <div>没有注册？<a href="{{route('signup')}}">现在注册</a></div>
    <div>忘记密码？<a href="{{route('password.request')}}">现在找回</a></div>
</div>
@endsection