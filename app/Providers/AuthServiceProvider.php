<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        
        Gate::define("show-dashboard", function($user){
            return $user->hasAnyRoles(["admin", "moderator"]);
        });
        
        
        Gate::define("dashboard-access", function($user){
            return $user->hasAnyRoles(["admin", "moderator"]);
        });
        
        Gate::define("manage-users", function($user){
            return $user->hasAnyRoles(["admin", "moderator"]);
        });
        
        Gate::define("edit-users", function($user){
            return $user->hasAnyRoles(["admin"]);
        });
        
        
        Gate::define("delete-users", function($user){
            return $user->hasRole("admin");
        });
        
        
        
        Gate::define("create-categories", function($user){
            return $user->hasRole("admin");
        });
        
        Gate::define("delete-categories", function($user){
            return $user->hasRole("admin");
        });
        
        
        Gate::define("create-posts-categories", function($user){
            return $user->hasAnyRoles(["admin", "moderator"]);
        });
        
        Gate::define("delete-posts-categories", function($user){
            return $user->hasAnyRoles(["admin", "moderator"]);
        });
        
        
        Gate::define("edit-expert", function($user){
            return $user->hasAnyRoles(["expert"]);
        });
        
        Gate::define("moderate", function($user){
            return $user->hasAnyRoles(["admin", "moderator"]);
        });
        //
    }
}
