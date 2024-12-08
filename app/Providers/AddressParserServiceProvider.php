<?php

namespace App\Providers;

use App\Services\AddressParsers\ParserInterface;
use App\Services\AddressParsers\TestParser;
use Illuminate\Support\ServiceProvider;

class AddressParserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->singleton(ParserInterface::class, function () {
            return new TestParser();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
