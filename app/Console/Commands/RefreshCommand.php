<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshCommand extends Command
{

    protected $signature = 'app:refresh';

    protected $description = 'Refresh';

    public function handle()
    {
        if (app()->isProduction()) {
            return self::FAILURE;
        }

        $this->call('migrate:refresh', [
            '--seed' => true
        ]);

        return self::SUCCESS;
    }
}
