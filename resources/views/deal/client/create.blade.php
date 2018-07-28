@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-offset-4">
                <h4 class="page-title">{{ __('validation.custom.companies.update') }}</h4>
            </div>
        </div>
        {{ Form::open(['method'=>'POST','url'=>route('client.store',compact('company'))]) }}
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
                        {{ Form::email('email',null,['class'=> 'form-control floating']) }}
                    </div>
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('tel',__('validation.attributes.phone'),['class'=>'control-label']) }}
                        {{ Form::tel('tel',null,['class'=> 'form-control floating']) }}
                    </div>
                    @if($errors->has('tel'))
                        <span class="text-danger">{{ $errors->first('tel') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('speaker',__('validation.attributes.speaker'),['class'=>'control-label']) }}
                        {{ Form::text('speaker',null,['class'=> 'form-control floating']) }}
                    </div>
                    @if($errors->has('speaker'))
                        <span class="text-danger">{{ $errors->first('speaker') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('address',__('validation.attributes.address'),['class'=>'control-label']) }}
                        {{ Form::text('address',null,['class'=> 'form-control floating']) }}
                    </div>
                    @if($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('description',__('validation.attributes.description'),['class'=>'control-label']) }}
                        {{ Form::text('description',null,['class'=> 'form-control floating']) }}
                    </div>
                    @if($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="">
                        <label for="city" class="">{{ __('validation.attributes.city') }} :</label>
                        <select name="city" id="city" class="select" title="city">
                            <option value="{{ $company->city_id }}" selected>{{ $company->city->city }}</option>
                            @foreach($cities as $city)
                                @if($city->id != $company->city_id)
                                    <option value="{{ $city->id }}">{{ $city->city }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @if($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group text-center col-md-4 col-md-offset-8">
            <button class="btn btn-primary btn-block account-btn" type="submit">{{ __('validation.custom.companies.create') }}</button>
        </div>

        {{ Form::close() }}
    </div>
@stop