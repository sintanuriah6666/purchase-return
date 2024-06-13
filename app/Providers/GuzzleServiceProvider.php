<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class GuzzleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client([
                'base_uri' => 'https://api.rajaongkir.com/starter/',
                'timeout'  => 30,
                'headers'  => [
                    'key' => '25ac07716543d70bee96175bd541c2b5',
                ],
            ]);
        });
    }

    public function boot()
    {
        //
    }
}
