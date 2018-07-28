@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-offset-4">
                <h4 class="page-title">{{ __('validation.custom.companies.update') }}</h4>
            </div>
        </div>
        {{ Form::model($user,['method'=>'PUT','url'=>route('post.update',compact('user','company')),'enctype'=>"multipart/form-data"]) }}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('name',__('validation.attributes.name'),['class'=>'control-label']) }}
                        {{ Form::text('name',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('email',__('validation.attributes.email'),['class'=>'control-label']) }}
                        {{ Form::email('email',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('password',__('validation.attributes.password'),['class'=>'control-label']) }}
                        {{ Form::password('password',['class'=> 'form-control floating']) }}
                    </div>
                    @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('password_confirmation',__('validation.attributes.password_confirmation'),['class'=>'control-label']) }}
                        {{ Form::password('password_confirmation',['class'=> 'form-control floating']) }}
                    </div>
                    @if($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('first_name',__('validation.attributes.first_name'),['class'=>'control-label']) }}
                        {{ Form::text('first_name',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('first_name'))
                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('last_name',__('validation.attributes.last_name'),['class'=>'control-label']) }}
                        {{ Form::text('last_name',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('tel',__('validation.attributes.phone'),['class'=>'control-label']) }}
                        {{ Form::tel('tel',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('tel'))
                        <span class="text-danger">{{ $errors->first('tel') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group text-center col-md-4 col-md-offset-8">
            <button class="btn btn-primary btn-block account-btn" type="submit">{{ __('validation.custom.companies.edit') }}</button>
        </div>

        {{ Form::close() }}
    </div>
@stop