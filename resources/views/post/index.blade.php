@extends('layouts.app')
@section('content')

    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">Employee</h4>
            </div>
            <div class="col-xs-8 text-right m-b-20">
                <a href="#" class="btn btn-primary pull-right rounded" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th style="width:30%;">Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-right">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>
                                <a href="#" class="avatar">{{ $post->name[0] }}</a>
                                <h2><a href="{{ route('post.show',compact('company','post')) }}">{{ $post->name }}</a></h2>
                            </td>
                            <td>{{ $post->email }}</td>
                            <td>{{ $post->category->category }}</td>
                            <td class="text-right">{{ $post->status->status }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="add_employee" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                </div>
                <div class="modal-body">
                    <form class="m-b-30">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Username <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <input class="form-control" type="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Confirm Password</label>
                                    <input class="form-control" type="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Employee ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Joining Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Phone </label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Company</label>
                                    <select class="select">
                                        <option>Global Technologies</option>
                                        <option>Delta Infotech</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Designation</label>
                                    <select class="select">
                                        <option>Web Developer</option>
                                        <option>Web Designer</option>
                                        <option>SEO Analyst</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive m-t-15">
                            <table class="table table-striped custom-table">
                                <thead>
                                <tr>
                                    <th>Module Permission</th>
                                    <th class="text-center">Read</th>
                                    <th class="text-center">Write</th>
                                    <th class="text-center">Create</th>
                                    <th class="text-center">Delete</th>
                                    <th class="text-center">Import</th>
                                    <th class="text-center">Export</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Holidays</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
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
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leave Request</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
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
                                <tr>
                                    <td>Clients</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
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
                                <tr>
                                    <td>Projects</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
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
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasks</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chats</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Assets</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Timing Sheets</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
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
            </div>
        </div>
    </div>
    <div id="edit_employee" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                </div>
                <div class="modal-body">
                    <form class="m-b-30">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" value="John" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input class="form-control" value="Doe" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Username <span class="text-danger">*</span></label>
                                    <input class="form-control" value="johndoe" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" value="johndoe@example.com" type="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <input class="form-control" value="johndoe" type="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Confirm Password</label>
                                    <input class="form-control" value="johndoe" type="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Employee ID <span class="text-danger">*</span></label>
                                    <input type="text" value="FT-0001" readonly="" class="form-control floating">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Joining Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Phone </label>
                                    <input class="form-control" value="9843014641" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Company</label>
                                    <select class="select">
                                        <option>Global Technologies</option>
                                        <option>Delta Infotech</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Designation</label>
                                    <select class="select">
                                        <option>Web Developer</option>
                                        <option>Web Designer</option>
                                        <option>SEO Analyst</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive m-t-15">
                            <table class="table table-striped custom-table">
                                <thead>
                                <tr>
                                    <th>Module Permission</th>
                                    <th class="text-center">Read</th>
                                    <th class="text-center">Write</th>
                                    <th class="text-center">Create</th>
                                    <th class="text-center">Delete</th>
                                    <th class="text-center">Import</th>
                                    <th class="text-center">Export</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Holidays</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
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
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leave Request</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
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
                                <tr>
                                    <td>Projects</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
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
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasks</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chats</td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input checked="" type="checkbox">
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
                            <button class="btn btn-primary btn-lg">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="delete_employee" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                </div>
                <form>
                    <div class="modal-body card-box">
                        <p>Are you sure want to delete this?</p>
                        <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop