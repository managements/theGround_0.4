@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-7">
                <h4 class="page-title">My Profile</h4>
            </div>

            <div class="col-xs-5 text-right m-b-30">
                <a href="#" class="btn btn-primary rounded"><i class="fa fa-plus"></i> Edit Token</a>
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Token:</span>
                                            <span class="text">{{ $token->token }}</span>
                                        </li>
                                        <li>
                                            <span class="title">category:</span>
                                            <span class="text">{{ $token->category->category }}</span>
                                        </li>
                                        <li>
                                            <span class="title">range:</span>
                                            <span class="text">{{ $token->range }} Jours</span>
                                        </li>
                                        <li>
                                            <span class="title">created_at:</span>
                                            <span class="text">{{ $token->created_at }}</span>
                                        </li>
                                        <li>
                                            <span class="title">updated_at:</span>
                                            <span class="text">{{ $token->updated_at }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop