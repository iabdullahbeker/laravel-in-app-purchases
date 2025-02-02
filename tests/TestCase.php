<?php

namespace Tests;

use Imdhemy\Purchases\ServiceProviders\LiapServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Tests\Doubles\LiapTestProvider;

/**
 * Test Case
 * All test cases that requires a laravel app instance should extend this class
 */
class TestCase extends Orchestra
{
    /**
     * @inheritdoc
     */
    protected function getPackageProviders($app): array
    {
        return [
            LiapServiceProvider::class,
            LiapTestProvider::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'sqlite');

        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /**
     * Get the path to assets dir.
     *
     * @param string|null $path
     *
     * @return string
     */
    protected function testAssetPath(?string $path = null): string
    {
        $assetsPath = __DIR__ . '/assets';

        if ($path) {
            return $assetsPath . '/' . $path;
        }

        return $assetsPath;
    }
}
