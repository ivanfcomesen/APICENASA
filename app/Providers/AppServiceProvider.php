<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(150);
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        /* if ($this->app->environment() !== 'production') {
          $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
          } */
        $this->app->singleton('GuzzleHttp\Client', function() {
            return new Client([
                'base_uri' => 'http://test-tgrupal.addax.cc',
                'timeout' => 40.0,
                'Key' => 'S2V5IHRlbXBvcmFsIHBhcmEgc3ViYXN0YXMu',
                'cookies' => true
            ]);
        });
    }

}
