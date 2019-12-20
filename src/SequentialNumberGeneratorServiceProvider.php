<?php

namespace Spielfigur\LaravelSequentialNumberGenerator;

use Illuminate\Support\ServiceProvider;

class SequentialNumberGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes(array(
            __DIR__ . '/../config/sequential-number-generator.php' => base_path('config/sequential-number-generator.php'),
        ), 'config');
    }

    public function register()
    {
        $this->app->bind('sequential-number-generator', function () {
            return new SequentialNumberGeneratorFactory();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/sequential-number-generator.php', 'sequential-number-generator');
    }
}
