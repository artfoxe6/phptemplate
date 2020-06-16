<?php

namespace App\Providers;

use App\Auth\CustomizeGuard;
use App\Auth\CustomizeProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Auth::provider('customize_token', function () {
            return app(CustomizeProvider::class);
        });
        Auth::extend('customize_token', function($app,$name,array $config) {
            return new CustomizeGuard(
                Auth::createUserProvider($config['provider']),
                $app->request
            );
        });
        //
    }
}
