@extends('layouts.default')
@section('title', '更新密码')

@section('content')
<h1>更新密码</h1>
<form method="POST" action="{{ route('password.update') }}">
  @csrf

  <input type="hidden" name="token" value="{{ $token }}">

  <div>
    <label for="email">Email</label>

    <div>
      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
        value="{{ $email ?? old('email') }}" required autofocus>
    </div>

    @if ($errors->has('email'))
    <strong>{{ $errors->first('email') }}</strong>
    @endif
  </div>

  <div>
    <label for="password">密码</label>

    <div>
      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
        name="password" required>
    </div>

    @if ($errors->has('password'))
    <strong>{{ $errors->first('password') }}</strong>
    @endif
  </div>


  <div>
    <label for="password-confirm">确认密码</label>
    <div>
      <input id="password-confirm" type="password" name="password_confirmation" required>
    </div>
  </div>

  <div>
    <button type="submit">
      重置密码
    </button>
  </div>
</form>
</div>

@endsection