@extends('layouts.guest')

@section('content')
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <h3 class="account-title">{{ __('Forgot Password') }}</h3>
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Preadmin"></a>
                        </div>
                        {{ Form::open(['method'=> 'POST','url'=>route('password.email')]) }}
                        <div class="form-group form-focus">
                            {{ Form::label('email',__('validation.attributes.email'),['class'=>'control-label']) }}
                            {{ Form::email('email',null,['class'=>'form-control floating','required']) }}
                        </div>
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-block account-btn"
                                    type="submit">{{ __('Reset Password') }}
                            </button>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('login') }}">{{ __('Back to Login') }}</a>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
