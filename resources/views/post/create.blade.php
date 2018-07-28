@extends('layouts.app')
@section('content')
    <div class="modal-header">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">Add Employee</h4>
            </div>
            <div class="col-xs-8 text-right m-b-20">
                <a href="#" class="btn btn-primary pull-right rounded" data-toggle="modal" data-target="#add_employee"> Range</a>
            </div>
        </div>
    </div>
    <div class="modal-body">
        <form class="m-b-30">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Range <span class="text-danger">*</span></label>
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
            <div class="table-responsive m-t-15">
                <table class="table table-striped custom-table">
                    <thead>
                    <tr>
                        <th>Module Permission</th>
                        <th class="text-center">list</th>
                        <th class="text-center">views</th>
                        <th class="text-center">Create</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Posts</td>
                        <td class="text-center">
                            <input type="checkbox">
                        </td>
                        <td class="text-center">
                            <input type="checkbox">
                        </td>
                        <td class="text-center">
                            <input type="checkbox">
                        </td>
                        <td class="text-center">
                            <input type="checkbox">
                        </td>
                        <td class="text-center">
                            <input type="checkbox">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary btn-lg">Create Employee</button>
            </div>
        </form>
    </div>
@stop