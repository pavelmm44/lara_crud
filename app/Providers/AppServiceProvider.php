<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /*DB::listen(function($query) {
            $sql = $query->sql;
            $bindings = $query->bindings;
            $executionTime = $query->time;

            var_dump($sql . ' === ' . print_r($bindings, true) . '<br>');
        });*/
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('update-event', function (User $user, Event $event) {
           return  $user->id === $event->user_id;
        });
    }
}
