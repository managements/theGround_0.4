<?php

Auth::routes();

Route::middleware('auth')->get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->middleware('admin')->resource('companies','Company\companyController');

Route::middleware('auth')->middleware('admin')->resource('status','Company\StatusController')->only(['edit','update']);

Route::middleware('auth')->middleware('admin')->resource('range','Company\RangeController')->only(['edit','update']);

Route::middleware('auth')->middleware('admin')->resource('sold','Company\SoldController')->only(['edit','update']);

Route::middleware('auth')->middleware('admin')->resource('city','City\CityController')->except(['show']);

Route::middleware('auth')->resource('{company}/token','Token\TokenController');

Route::middleware('auth')->resource('{company}/post','Post\PostController');

Route::middleware('auth')->resource('{company}/user','User\UserController');

Route::middleware('auth')->resource('{company}/provider','Deal\ProviderController');

Route::middleware('auth')->resource('{company}/client','Deal\ClientController');
