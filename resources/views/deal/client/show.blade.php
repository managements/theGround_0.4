@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-7">
                <h4 class="page-title">{{ $deal->name }}</h4>
            </div>
            <div class="col-xs-5 text-right m-b-30">
                <a href="{{ route('client.edit',compact('company','deal')) }}" class="btn btn-primary rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                <a href="{{ route('client.destroy',compact('company','deal')) }}" class="btn btn-primary rounded"
                   onclick="event.preventDefault();
                                                     document.getElementById('delete-client').submit();">
                    <i class="fa fa-plus"></i> Delete
                </a>

                <form id="delete-client" action="{{ route('client.destroy',compact('company','deal')) }}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
        <div class="card-box m-b-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img class="avatar" src="{{ asset('img/user.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0">{{ $deal->name }}</h3>
                                        <h5 class="company-role m-t-0 m-b-0">{{ $deal->speaker }}</h5>
                                        <ul class="personal-info m-t-12 m-b-12">
                                            <li>
                                                <span class="title">created_at:</span>
                                                <span class="text"><a href="#">{{ $deal->created_at }}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">update_at:</span>
                                                <span class="text"><a href="#">{{ $deal->updated_at }}</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="#">{{ $deal->tel }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#">{{ ($deal->email) ?: 'inconnu' }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">{{ $deal->address }}</span>
                                        </li>
                                        <li>
                                            <span class="title">city:</span>
                                            <span class="text">{{ $deal->city->city }}</span>
                                        </li>
                                        <li>
                                            <span class="title">description:</span>
                                            <span class="text">{{ $deal->description }}</span>
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