<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Http\Guards\FixedSanctumGuard;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        \Auth::extend('fixed_sanctum', function ($app, $name, array $config) {
            return new FixedSanctumGuard(
                $app['auth'],
                $app['encrypter'],
                \Auth::createUserProvider($config['provider']),
                $app['request']
            );
        });
        //
    }
}
