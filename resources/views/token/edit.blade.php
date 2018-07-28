@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="modal-header">
            <h4 class="modal-title">Add Token {{ $company->sold }}</h4>
        </div>
        <div class="modal-body">
            {{ Form::model($token,['method'=>'PUT','url'=> route('token.update',compact('company','token')),'class'=>'m-b-30']) }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Range <span class="text-danger">*</span></label>
                        {{ Form::number('range',null,['class'=> 'form-control']) }}
                    </div>
                    @if($errors->has('range'))
                        {{ $errors->first('range') }}
                    @endif
                </div>
                <div class="col-lg-6">
                    <label for="">Post Category <span class="text-danger">*</span></label>
                    <select name="category" class="form-control">
                        <option value="{{ $token->category_id }}">{{ $token->category->category }}</option>
                        @foreach($categories as $category)
                            @if($category->id != $token->category_id)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('category'))
                        {{ $errors->first('category') }}
                    @endif
                </div>
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary btn-lg">Create Token</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop