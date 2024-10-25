<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('edit-user', function ($loggedUser, User $user) {
            //dd($user);
            return $loggedUser->is($user);
        });

        Gate::define('edit-profile', function($loggedUser,$profile){
            //dd($profile->user->is($loggedUser));
            return  $loggedUser->profile->is($profile);
        });
    }
}
