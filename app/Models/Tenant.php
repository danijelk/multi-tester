<?php

namespace App\Models;

class Tenant extends \Spatie\Multitenancy\Models\Tenant
{
    protected $guarded = [];
    protected $casts = [
        'websocket' => 'object',
    ];
}
