<?php

namespace App;

use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\Models\Concerns\UsesTenantModel;

class TenantFinder extends \Spatie\Multitenancy\TenantFinder\TenantFinder
{
    use UsesTenantModel;

    public function findForRequest(Request $request): ?Tenant
    {
        $host = $request->getHost();

        $cacheKey = 'findForRequest-' . $host;

        return cache()->remember($cacheKey, now()->addWeek(), function () use ($host) {
            if ($tenant = $this->getTenantModel()::whereDomain($host)->first()) {
                return $tenant;
            }

            return $this->getTenantModel()::where('id', 1)->first();
        });
    }
}
