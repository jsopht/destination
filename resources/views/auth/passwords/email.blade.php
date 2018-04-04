@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col auth mt-5 pt-5">
    <div class="card">

      <div class="card-body">
        <div class="card-title"><h1>Reset Password</h1></div>

        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif

        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-Mail Address</label>

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg">
              Send Password Reset Link
            </button>
          </div>
        </form>
        <div class="form-group text-center">
          <a href="{{ route('login') }}" class="btn btn-link">Login</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
