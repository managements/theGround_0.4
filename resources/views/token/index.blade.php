@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">Employee</h4>
            </div>
            <div class="col-xs-8 text-right m-b-20">
                <a href="#" class="btn btn-primary pull-right rounded"><i class="fa fa-plus"></i> Add Token</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th style="width:30%;">Token</th>
                            <th>Range</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($company->tokens as $token)
                            <tr>
                                <td>{{ $token->token }}</td>
                                <td>{{ $token->range }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" ><i class="fa fa-pencil m-r-5"></i> Show</a></li>
                                            <li><a href="#" ><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li><a href="#" ><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
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