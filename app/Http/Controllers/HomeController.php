<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->is_admin;
        if($user){
            $company = new Company\CompanyController();
            return $company->index();
        }
        $company = User::where('id',Auth::user()->id)->first()->company;
        return view('company.show',compact('company'));
    }
}
