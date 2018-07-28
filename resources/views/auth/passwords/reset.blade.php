@extends('layouts.guest')

@section('content')
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <h3 class="account-title">{{ __('Change Password') }}</h3>
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Preadmin"></a>
                        </div>
                        {{ Form::open(['method'=>'POST','url'=>route('password.request')]) }}
                            <div class="form-group form-focus">
                                {{ Form::label('email',__('validation.attributes.email'),['class'=>'control-label']) }}
                                {{ Form::password('email',null,['class'=>'form-control floating','required']) }}
                            </div>
                            <div class="form-group form-focus">
                                {{ Form::label('password',__('validation.attributes.password'),['class'=>'control-label']) }}
                                {{ Form::password('password',['class'=>'form-control floating','required']) }}
                            </div>
                            <div class="form-group form-focus">
                                {{ Form::label('password_confirmation',__('validation.attributes.password_confirmation'),['class'=>'control-label']) }}
                                {{ Form::password('password_confirmation',['class'=>'form-control floating','required']) }}
                            </div>
                            <div class="form-group m-b-0 text-center">
                                <button class="btn btn-primary btn-block account-btn" type="submit">Change Password</button>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
