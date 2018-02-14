@extends('layouts.app')

@section('content')
<div class="columns">
  <div class="column is-one-third is-offset-one-third m-t-100">
    <div class="card">
      <div class="card-content">
        <h1 class="title">Reset Password</h1>
        <form method="POST" action="{{ route('password.request') }}" role="form">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
        <div class="field">
          <label class="label">Email</label>
          <div class="control has-icons-left">
            <input class="input {{ $errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" placeholder="name@mail.com" value="{{ old('email') }}" required autofocus>
            <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
            </span>
          </div>
          @if ($errors->has('email'))
            <p class="help is-danger">{{ $errors->first('email') }}</p>
          @endif
        </div>
        <div class="field">
          <label for="password" class="label">Password</label>
          <div class="control has-icons-left">
            <input class="input {{$errors->has('password') ? 'is-danger':''}}" type="password" name="password" id="password" required>
            <span class="icon is-small is-left">
              <i class="fa fa-unlock-alt"></i>
            </span>
          </div>
          @if ($errors->has('password'))
            <p class="help is-danger">{{ $errors->first('password') }}</p>
          @endif
        </div>
        <div class="field">
          <label for="password-confirm" class="label">Confirm Password</label>
          <div class="control has-icons-left">
            <input class="input {{$errors->has('password-confirm') ? 'is-danger':''}}" type="password" name="password-confirmation" id="password-confirm" required>
            <span class="icon is-small is-left">
              <i class="fa fa-unlock-alt"></i>
            </span>
          </div>
          @if ($errors->has('password_confirmation'))
              <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
          @endif
        </div>
        <button class="button is-primary is-outlined is-fullwidth m-t-20" type="submit">Reset Password</button>
      </form>
      </div><!-- end of card-content -->
    </div>
    <h5 class="has-text-centered">
      <a href="{{route('login')}}" class="is-muted">
        Back to Login
      </a>
    </h5>
  </div>
</div>
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
