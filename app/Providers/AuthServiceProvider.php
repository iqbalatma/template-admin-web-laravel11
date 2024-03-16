<?php

namespace App\Providers;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole(Role::SUPER_ADMIN->value) ? true : null;
        });

        ResetPassword::createUrlUsing(function (User $user, string $token) {
            return route('forgot.password.request.reset.password', ["email" => $user->email, "token" => $token]);
        });
    }
}
