@extends('layouts.default')
@section('title', '注册')

@section('content')
<form action="{{route('users.store')}}" method="post">
    @csrf
    <div>
        <label for="name">名称</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}">
    </div>
    <div>
        <label for="email">邮箱</label>
        <input id="email" type="text" name="email" value="{{ old('email') }}">
    </div>
    <div>
        <label for="password">密码</label>
        <input id="password" type="password" name="password" value="{{ old('password') }}">
    </div>
    <div>
        <label for="password_confirmation">确认密码</label>
        <input id="password_confirmation" type="text" name="password_confirmation"
            value="{{ old('password_confirmation') }}">
    </div>
    <button type="submit">注册</button>
</form>
@endsection
