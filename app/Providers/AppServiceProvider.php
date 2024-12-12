<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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
        Gate::define('is-owner', function($user, User $profileUser) {
            return $user->id == $profileUser->id;
        });

        Gate::define('manage-task', function ($user, Task $task) {
            return $user->id === $task->user_id;
        });
    }
}
