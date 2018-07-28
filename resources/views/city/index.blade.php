@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-xs-3">
                <h4 class="page-title">{{ __('validation.custom.companies.companies') }}</h4>
            </div>
            <div class="col-sm-8 col-xs-9 text-right m-b-20">
                <a href="{{ route('city.create') }}" class="btn btn-primary rounded pull-right"><i
                            class="fa fa-plus"></i> {{ __('validation.custom.companies.add') }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th>{{ __('validation.attributes.city') }}</th>
                            <th class="text-right">{{ __('validation.attributes.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <td>{{ $city->city }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="{{ route('city.edit', $city) }}"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li>
                                                <a href="{{ route('city.destroy', $city) }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('destroy-city').submit();">
                                                    <i
                                                            class="fa fa-pencil m-r-5"></i> {{ __('validation.custom.companies.destroy') }}
                                                </a>
                                                {{ Form::open(['method'=>'DELETE','url'=>route('city.destroy',$city),'id'=>'destroy-city','style'=>"display: none;"]) }}
                                                {{ Form::close() }}
                                            </li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
