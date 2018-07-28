@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-offset-4">
                <h4 class="page-title">{{ __('validation.custom.city.update') }}</h4>
            </div>
        </div>
        {{ Form::open(['method' => 'POST','url' => route('city.store')]) }}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('city',__('validation.attributes.city'),['class'=>'control-label']) }}
                        {{ Form::text('city',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group text-center col-md-4 col-md-offset-8">
            <button class="btn btn-primary btn-block account-btn" type="submit">{{ __('validation.custom.city.edit') }}</button>
        </div>

        {{ Form::close() }}
    </div>
@stop