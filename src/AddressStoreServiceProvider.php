<?php

namespace VisualSignal\AddressStore;

use Illuminate\Support\ServiceProvider;

class AddressStoreServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }
}