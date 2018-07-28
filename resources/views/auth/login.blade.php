@extends('layouts.guest')

@section('content')
    <div class="container">
        <h3 class="account-title">{{ __('login') }}</h3>
        <div class="account-box">
            <div class="account-wrapper">
                <div class="account-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Preadmin"></a>
                </div>
                {{ Form::open(['method'=>'POST','url'=>route('login')]) }}
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('email',__('validation.attributes.email'),['class'=>'control-label']) }}
                        {{ Form::email('email',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('password',__('validation.attributes.password'),['class'=>'control-label']) }}
                        {{ Form::password('password',['class'=>'form-control floating','required']) }}
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
                </div>

                <div class="text-center">
                    <a href="{{ route('register') }}">{{ __('I don\'t have an account yet ;)') }}</a>
                </div>

                <div class="text-center">
                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
