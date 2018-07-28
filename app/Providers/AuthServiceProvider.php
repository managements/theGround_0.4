<?php

namespace App\Providers;

use App\Company;
use App\Deal;
use App\Policies\CompanyPolicy;
use App\Policies\Deal\DealPolicy;
use App\Policies\Post\PostPolicy;
use App\Policies\Token\TokenPolicy;
use App\Token;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Company::class  => CompanyPolicy::class,
        Token::class    => TokenPolicy::class,
        User::class    => PostPolicy::class,
        Deal::class    => DealPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
