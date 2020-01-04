@extends('layouts.default')
@section('title', '更新密码')

@section('content')
@include('shared._errors')

<div class="container">
  <h1 class="title">更新密码</h1>
  <form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="field">
      <label class="label">邮箱</label>
      <div class="control">
        <input class="input" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
      </div>
    </div>

    <div class="field">
      <label class="label">密码</label>
      <div class="control">
        <input class="input" type="password" name="password" required>
      </div>
    </div>

    <div class="field">
      <label class="label">确认密码</label>
      <div class="control">
        <input class="input" type="password" name="password_confirmation" required>
      </div>
    </div>

    <div>
      <button type="submit" class="button is-primary">
        重置密码
      </button>
    </div>
  </form>
</div>

@endsection