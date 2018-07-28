<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use App\Post;
use App\Rules\TelRule;
use App\Token;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => 'required|string|max:255',
            'password'  => 'required|string|min:6|confirmed',
            'first_name'=> 'required|string|min:3|max:15',
            'last_name' => 'required|string|min:3|max:15',
            'tel'       => ['required','string', new TelRule(),'unique:companies,tel','unique:users,tel'],
            'email'     => 'required|string|email|max:255|unique:users,email',
            'token'     => 'required|string|min:6|max:50|exists:tokens,token',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $token = Token::where('token', $data['token'])->first();
        $limit = gmdate('Y-m-d H:i:s',strtotime("+$token->range days"));
        $user =  User::create([
            'name'          => $data['name'],
            'password'      => Hash::make($data['password']),
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'tel'           => $data['tel'],
            'email'         => $data['email'],
            'limit'         => $limit,
            'company_id'    => $token->company_id,
            'status_id'     => 2,
            'category_id'   => $token->category_id
        ]);
        if($token->category_id === 1){
            Company::activate($token->company_id, $limit);
        }
        $token->delete();
        return $user;
    }
}
