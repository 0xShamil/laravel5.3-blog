<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;

use App\Models\User;
use App\Policies\UserPolicy;

use App\Models\Category;
use App\Policies\CategoryPolicy;

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
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class,
        Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-dashboard', function ($user) {
            return $user->hasRole('Author') || $user->hasRole('Editor') || $user->hasRole('Admin');
        });

        Gate::define('manage-posts', function ($user) {
            return $user->hasRole('Admin') || $user->hasRole('Editor');
        });

        Gate::define('manage-users', function ($user) {
            return $user->hasRole('Admin');
        });
    }
}
