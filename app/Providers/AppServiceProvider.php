<?php

namespace App\Providers;

use App\Models\User;
// use Illuminate\Auth\Access\Gate;
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
        Gate::define('isAdmin',function(User $user){
             return $user->role == 'admin';
            });
         gate::define('isuser',function( user $user){
             return $user->role == 'user';
           });

    }
}
