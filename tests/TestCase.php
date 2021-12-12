<?php

namespace Seshac\Shiprocket\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Seshac\Shiprocket\ShiprocketServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            ShiprocketServiceProvider::class,
        ];
    }
}
