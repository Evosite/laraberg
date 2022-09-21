<?php

namespace RobChett\Laraberg\Test;

use RobChett\Laraberg\LarabergFacade;
use RobChett\Laraberg\LarabergServiceProvider;
use Orchestra\Testbench\Testcase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return RobChett\Laraberg\LarabergServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [LarabergServiceProvider::class];
    }
    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Laraberg' => LarabergFacade::class,
        ];
    }
}

