@extends('layouts.app')

@section('content')
@if (session('status'))
  <div class="notification is-success">
      {{ session('status') }}
  </div>
@endif
<div class="columns">
  <div class="column is-one-third is-offset-one-third m-t-100">
    <div class="card">
      <div class="card-header">
        <p class="card-header-title">Reset Password</p>
      </div>
      <div class="card-content">

        <form method="POST" action="{{ route('password.email') }}" role="form">
          @csrf
        <div class="field">
          <label for="email" class="label">Email</label>
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
        <button class="button is-primary is-outlined is-fullwidth m-t-20">Send Password Reset Link</button>
      </form>
      </div><!-- end of card-content -->
    </div>
    <h5 class="has-text-centered">
      <a href="{{route('login')}}" class="is-muted">
        <i class="fa fa-caret-left"></i> Back to Login
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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
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
