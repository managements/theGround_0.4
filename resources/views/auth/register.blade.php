@extends('layouts.guest')

@section('content')
    <div class="container">
        <h3 class="account-title">{{ __('register') }}</h3>
        <div class="account-box">
            <div class="account-wrapper">
                <div class="account-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Preadmin"></a>
                </div>
                {{ Form::open(['method'=> 'POST','url'=>route('register'), 'class'=>'form-horizontal']) }}
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('name',__('validation.attributes.username'),['class'=>'control-label']) }}
                        {{ Form::text('name',null,['class'=>'form-control floating','required']) }}
                    </div>
                </div>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->fisrt('name') }}</span>
                @endif
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('email',__('validation.attributes.email'),['class'=>'control-label']) }}
                        {{ Form::email('email',null,['class'=>'form-control floating','required']) }}
                    </div>
                </div>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('password',__('validation.attributes.password'),['class'=>'control-label']) }}
                        {{ Form::password('password',['class'=>'form-control floating','required']) }}
                    </div>
                </div>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('password_confirmation',__('validation.attributes.password_confirmation'),['class'=>'control-label']) }}
                        {{ Form::password('password_confirmation',['class'=>'form-control floating','required']) }}
                    </div>
                </div>
                @if($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('last_name',__('validation.attributes.last_name'),['class'=>'control-label']) }}
                        {{ Form::text('last_name',null,['class'=>'form-control floating','required']) }}
                    </div>
                </div>
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('first_name',__('validation.attributes.first_name'),['class'=>'control-label']) }}
                        {{ Form::text('first_name',null,['class'=>'form-control floating','required']) }}
                    </div>
                </div>
                @if($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('tel',__('validation.attributes.phone'),['class'=>'control-label']) }}
                        {{ Form::text('tel',null,['class'=>'form-control floating','required']) }}
                    </div>
                </div>
                @if($errors->has('tel'))
                    <span class="text-danger">{{ $errors->first('tel') }}</span>
                @endif
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('token',__('validation.attributes.token'),['class'=>'control-label']) }}
                        {{ Form::text('token',null,['class'=>'form-control floating','required']) }}
                    </div>
                </div>
                @if($errors->has('token'))
                    <span class="text-danger">{{ $errors->first('token') }}</span>
                @endif
                <!-- conditions -->
                <div class="form-group text-center">
                    <button class="btn btn-primary btn-block account-btn" type="submit">{{ __('register') }}</button>
                </div>
                <div class="text-center">
                    <a href="{{ route('login') }}">{{ __('Already have an account?') }}</a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
