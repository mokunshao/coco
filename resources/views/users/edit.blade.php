@extends('layouts.default')

@section('title','更新个人资料')

@section('content')
@include('shared._errors')
<div>更新个人资料</div>
<div>
    <a href="http://gravatar.com/emails" target="_blank">
        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" />
    </a>
</div>
<form action="{{route('users.update',$user)}}" method="post">
    @method('PATCH')
    @csrf
    <div>
        <label for="name">名称</label>
        <input type="text" name="name" value="{{ $user->name }}">
    </div>
    <div>
        <label for="email">邮箱</label>
        <input disabled type="email" name="email" value="{{ $user->email }}">
    </div>
    <div>
        <label for="password">密码</label>
        <input type="password" name="password" value="{{ old('password') }}">
    </div>

    <div>
        <label for="password_confirmation">确认密码</label>
        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
    </div>
    <button type="submit">更新</button>
</form>
@endsection
