<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
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
        //
    }
}
