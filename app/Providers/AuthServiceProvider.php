<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 加入 Passport 的 routes, 記得 use Laravel\Passport\Passport
        Passport::routes();

        // 加入 Facebook_information、GitHub_information、Twitter_information 存取權限規則
        Passport::tokensCan([
            'Facebook_information' => 'Access your facebook information',
            'GitHub_information' => 'Access your github information',
            'Twitter_information' => 'Access your twitter information',
        ]);

    }
}
