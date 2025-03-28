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
        Gate::define('superAdmin',function(User $user){
            return $user->role==='superAdmin';
        });

        Gate::define('superAdmin-admin',function(User $user){
            return $user->role==='superAdmin'|| $user->role==='admin';
        });
        Gate::define('blog-access',function(User $user, $target){
            return $user->id===$target;
            });
        
    }
}
