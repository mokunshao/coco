@extends('layouts.default')

@section('title', '注册')

@section('content')

@include('shared._errors')

<div class="container">
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <div class="field">
            <label class="label">名称</label>
            <div class="control">
                <input class="input" type="text" name="name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="field">
            <label class="label">邮箱</label>
            <div class="control">
                <input class="input" type="text" name="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="field">
            <label class="label">密码</label>
            <div class="control">
                <input class="input" type="password" name="password" value="{{ old('password') }}">
            </div>
        </div>
        <div class="field">
            <label class="label">确认密码</label>
            <div class="control">
                <input class="input" type="password" name="password_confirmation"
                    value="{{ old('password_confirmation') }}">
            </div>
        </div>
        <button class="button is-primary" type="submit">注册</button>
    </form>
    <div>已经有账号？请<a href="{{route('login')}}">登录</a></div>
</div>

@endsection