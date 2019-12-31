@extends('layouts.default')
@section('title','重置密码')

@section('content')
<h1>重置密码</h1>

@if (session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif

@if ($errors->has('email'))
<span class="form-text">
  <strong>{{ $errors->first('email') }}</strong>
</span>
@endif

<form action="{{route('password.email')}}" method="post">
  @csrf
  <div>
    <label for="email">邮箱</label>
    <input id="email" type="email" name="email">
  </div>
  <div><button type="submit">发送密码重置邮件</button></div>
</form>
@endsection