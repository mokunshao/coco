@extends('layouts.default')

@section('title','更新个人资料')

@section('content')
@include('shared._errors')
<div class="container">
    <h1 class="title">更新个人资料</h1>
    <div class="block">
        <a href="http://gravatar.com/emails" target="_blank">
            <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" />
        </a>
    </div>
    <form action="{{route('users.update',$user)}}" method="post">
        @method('PATCH')
        @csrf

        <div class="field">
            <label class="label">名称</label>
            <div class="control">
                <input class="input" type="text" name="name" value="{{ $user->name }}">
            </div>
        </div>

        <div class="field">
            <label class="label">邮箱</label>
            <div class="control">
                <input class="input" disabled readonly type="email" name="email" value="{{ $user->email }}">
            </div>
        </div>

        <div class="field">
            <label class="label">密码</label>
            <div class="control">
                <input class="input" type="password" name="password">
            </div>
        </div>

        <div class="field">
            <label class="label">确认密码</label>
            <div class="control">
                <input class="input" type="password" name="password_confirmation">
            </div>
        </div>

        <button class="button is-primary" type="submit">更新</button>
    </form>
</div>
@endsection