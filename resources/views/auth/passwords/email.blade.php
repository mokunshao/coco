@extends('layouts.default')
@section('title','重置密码')

@section('content')
@include('shared._errors')

@if (session('status'))
<div class="notification is-success">
  {{ session('status') }}
</div>
@endif

<div class="container">
  <h1 class="title">重置密码</h1>
  <form action="{{route('password.email')}}" method="post">
    @csrf
    <div class="field">
      <label class="label">邮箱</label>
      <div class="control">
        <input class="input" type="email" name="email">
      </div>
    </div>
    <div><button class="button is-primary" type="submit">发送密码重置邮件</button></div>
  </form>
</div>
@endsection