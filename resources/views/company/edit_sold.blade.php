@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-offset-4">
                <h4 class="page-title">{{ __('validation.custom.companies.update') }}</h4>
            </div>
        </div>
        {{ Form::open(['method'=>'PUT','url'=>route('sold.update',$company->id)]) }}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('sold',__('validation.attributes.sold'),['class'=>'control-label']) }}
                        {{ Form::text('sold',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('sold'))
                        <span class="text-danger">{{ $errors->first('sold') }}</span>
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