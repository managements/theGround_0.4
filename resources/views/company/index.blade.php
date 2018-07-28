@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-xs-3">
                <h4 class="page-title">{{ __('validation.custom.companies.companies') }}</h4>
            </div>
            <div class="col-sm-8 col-xs-9 text-right m-b-20">
                <a href="{{ route('companies.create') }}" class="btn btn-primary rounded pull-right"><i
                            class="fa fa-plus"></i> {{ __('validation.custom.companies.add') }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th>{{ __('validation.attributes.status') }}</th>
                            <th>{{ __('validation.attributes.name') }}</th>
                            <th>{{ __('validation.custom.companies.contact') }}</th>
                            <th class="text-right">{{ __('validation.attributes.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->status->status }}</td>
                                <td>
                                    <a href="#" class="avatar"><img
                                                src="{{ asset('storage/' . $company->brand) }}"
                                                alt="{{ $company->name }}"></a>
                                    <h2><a href="{{ route('companies.show',$company) }}">{{ $company->name }}</a></h2>
                                </td>
                                <td>
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm rounded dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false">
                                             Contact <i
                                                    class="caret"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#"><i class="fa fa-dot-circle-o text-dark"></i>
                                                    {{ $company->tel }}</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-dot-circle-o text-dark"></i>
                                                    {{ $company->speaker }}</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-dot-circle-o text-dark"></i>
                                                    {{ $company->email }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="{{ route('companies.edit', $company) }}"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit info</a></li>
                                            <li><a href="{{ route('range.edit', $company) }}"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit range</a></li>
                                            <li><a href="{{ route('sold.edit', $company) }}"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit sold</a></li>
                                            <li><a href="{{ route('status.edit', $company) }}"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit status</a></li>
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
