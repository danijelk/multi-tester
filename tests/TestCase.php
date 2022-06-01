<?php

namespace Tests;

use App\Metric\MetricFactory;
use Illuminate\Support\Facades\Event;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\Events\MadeTenantCurrentEvent;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Spatie\Multitenancy\Concerns\UsesMultitenancyConfig;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions, UsesMultitenancyConfig;

    protected function setUp(): void
    {
        parent::setUp();

        Tenant::first()->makeCurrent();
    }

    protected function connectionsToTransact()
    {
        return [
            $this->tenantDatabaseConnectionName(),
        ];
    }

}
