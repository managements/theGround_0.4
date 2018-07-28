@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-offset-4">
                <h4 class="page-title">{{ __('validation.custom.companies.update') }}</h4>
            </div>
        </div>
        {{ Form::model($company,['method'=>'PUT','url'=>route('status.update',$company->id)]) }}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="">
                        <label for="status" class="">{{ __('validation.attributes.status') }} :</label>
                        <select name="status_id" id="status" class="select" title="status">
                            <option value="{{ $company->status_id }}" selected>{{ $company->status->status }}</option>

                            @foreach($statutes as $status)
                                @if($status->id != $company->status_id)
                                    <option value="{{ $status->id }}">{{ $status->status }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @if($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
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