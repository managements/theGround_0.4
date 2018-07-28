@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-xs-3">
                <h4 class="page-title">Clients</h4>
            </div>
            <div class="col-sm-8 col-xs-9 text-right m-b-20">
                <a href="{{ route('provider.create',compact('company')) }}" class="btn btn-primary rounded pull-right"><i class="fa fa-plus"></i> Add Client</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Tel</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($providers as $provider)
                            <tr>
                                <td>
                                    <a href="{{ route('provider.show',compact('company','provider')) }}"
                                       class="avatar">{{ strtoupper($provider->name[0]) }}</a>
                                    <h2>
                                        <a href="{{ route('provider.show',compact('company','provider')) }}">{{ $provider->name }}</a>
                                    </h2>
                                </td>
                                <td>{{ $provider->tel }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="{{ route('provider.edit',compact('company','provider')) }}" ><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
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