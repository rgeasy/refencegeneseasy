@extends('layouts/master')

@section('content')
<style type="text/css">
    input {
        background-color: #f1f1f1 !important;
    }
</style>
    <div class="container-fluid" style="margin-top: 5%;">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4 style="text-align: center;">Login</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ url('/login') }}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('auth.E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{ __('auth.Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group form-check" >
                    <p style="text-align: right;">
                        <span style="font-size: 10px;">{{ __('auth.Forgot Your Password') }}?</span><a href="{{ route('password.forgotpassword') }}"> {{ __('auth.Recover') }}</a>
                    </p>
                </div>
                <button type="submit" class="btn btn-lg btn-block btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection

