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
            <h4 style="text-align: center;">{{ __('auth.Email Sent') }}</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('auth.Verify Your Email Address') }}</div>

                <div class="card-body text-center">
                    {{ __('auth.Before proceeding, please check your email for a verification link') }}.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
