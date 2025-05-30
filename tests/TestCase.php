<?php

namespace Clickbar\Magellan\Tests;

use Clickbar\Magellan\MagellanServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        DB::statement('CREATE EXTENSION IF NOT EXISTS "postgis";');

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Clickbar\\Magellan\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            MagellanServiceProvider::class,
        ];
    }
}
