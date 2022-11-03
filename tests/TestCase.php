<?php

namespace Wuwx\LaravelHashingSm3\Test;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Wuwx\LaravelHashingSm3\Sm3ServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            Sm3ServiceProvider::class,
        ];
    }
}