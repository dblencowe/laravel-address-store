<?php

namespace VisualSignal\AddressStore;

use Illuminate\Support\ServiceProvider;

class AddressStoreServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
        $this->publishes([
            __DIR__ . '/config/address_store.php' => config_path('address_store.php'),
        ]);
    }
}