<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('hasRole', function ($user, $role) {
            return $user->roles()->pluck('role_code')->contains($role);
        });

        Gate::define('comment', function ($user, $commentId) {
            return $user->id == $commentId;
        });

        Gate::define('deleteUser', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('DeleteUser');
        });

        Gate::define('deletePosts', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('DeletePosts');
        });

        Gate::define('showUser', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('ShowUser');
        });
    }
}
