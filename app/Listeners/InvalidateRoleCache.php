<?php

namespace App\Listeners;

use App\Events\RoleChangedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class InvalidateRoleCache
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(RoleChangedEvent $event): void
    {
        Cache::forget(config("cache.keys.all_role"));
    }
}
