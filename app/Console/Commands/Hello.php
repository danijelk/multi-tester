<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Multitenancy\Commands\Concerns\TenantAware;

class Hello extends Command
{
    use TenantAware;

    protected $signature = 'app:hello {--tenant=}';

    public function handle(): int
    {
        $this->info('hello');

        return 0;
    }
}
