@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col mt-5 pt-5">
    <div class="card auth">
      <div class="card-body">
        <div class="card-title"><h1>Login</h1></div>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-Mail Address</label>

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Password</label>

            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary btn-block btn-lg">
              Login
            </button>
          </div>
          <div class="form-group text-center">
            <a class="btn btn-link" href="{{ route('password.request') }}">
              Forgot Your Password?
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
