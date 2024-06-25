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
            return $user->permissions()->pluck('permission_code')->contains('DeleteUsers');
        });

        Gate::define('deletePosts', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('DeletePosts');
        });

        Gate::define('showUser', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('ShowUsers');
        });

        Gate::define('showPosts', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('ShowPosts');
        });

        Gate::define('createUser', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('CreateUsers');
        });

        Gate::define('changeStatus', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('ChangeStatus');
        });

        Gate::define('updatePosts', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('UpdatePosts');
        });
        Gate::define('updateUser', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('UpdateUsers');
        });
        Gate::define('createPosts', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('CreatePosts');
        });
        Gate::define('createPermission', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('CreatePermission');
        });
        Gate::define('updatePermission', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('UpdatePermission');
        });
        Gate::define('showPermission', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('ShowPermission');
        });
        Gate::define('deletePermission', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('DeletePermission');
        });
        Gate::define('createCategoryPermission', function ($user){
            return $user->permissions()->pluck('permission_code')->contains('CreateCategoryPermission');
        });

        Gate::before(function ($user) {
           if($user->roles()->pluck('role_code')->contains('SUPPERADMIN')){
               return true;
           }
        });
    }
}
