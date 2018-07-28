@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-7">
                <h4 class="page-title">{{ __('validation.custom.companies.company') }}</h4>
            </div>
            @can('delete', $company)
                <div class="col-xs-5 text-right m-b-30">
                    {{ Form::open(['method' => 'DELETE', 'url' => route('companies.destroy',$company)]) }}
                    <button type="submit" class="btn btn-danger rounded"><i
                                class="fa fa-trash-o "></i> {{ __('validation.custom.companies.destroy') }}</button>
                    {{ Form::close() }}
                </div>
            @endcan
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img class="avatar" src="{{ asset('storage/' . $company->brand) }}" alt=""></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 m-b-0">{{ $user->name }}</h3>
                                        <small class="text-muted">{{ $user->category->category }}</small>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <h4>{{ __('validation.custom.companies.contact') }} :</h4>
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">{{ __('validation.attributes.phone') }} :</span>
                                            <span class="text"><a href="#">{{ $user->tel }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">{{ __('validation.attributes.speaker') }} :</span>
                                            <span class="text"><a href="#">{{ $user->last_name . $user->first_name }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">{{ __('validation.attributes.email') }} :</span>
                                            <span class="text"><a href="#">{{ $user->email }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">{{ __('validation.attributes.created_at') }} :</span>
                                            <span class="text">{{ $user->created_at }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body">
                        <h6 class="panel-title m-b-15">{{ __('validation.custom.companies.technical') }} :</h6>
                        <table class="table table-striped table-border">
                            <tbody>
                            <tr>
                                <td>{{ __('validation.attributes.range') }} :</td>
                                <td class="text-right">{{ ($user->range) ?: 0 }} Jours</td>
                            </tr>
                            <tr>
                                <td>{{ __('validation.attributes.updated_at') }} :</td>
                                <td class="text-right">{{ $user->updated_at }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('validation.custom.companies.limit') }} :</td>
                                <td class="text-right">{{ $user->limit }}</td>
                            </tr>
                            <tr>
                                <td>Pdg:</td>
                                <td class="text-right"><a href="#">{{ $user->category->category }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ __('validation.attributes.status') }} :</td>
                                <td class="text-right">{{ $user->status->status }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
            </div>
        </div>
    </div>
@stop