<?php

namespace RobChett\Laraberg;

use Illuminate\Support\ServiceProvider;
use RobChett\Laraberg\Blocks\BlockParser;
use RobChett\Laraberg\Blocks\BlockTypeRegistry;
use RobChett\Laraberg\Blocks\ContentRenderer;
use RobChett\Laraberg\Services\OEmbedService;

class LarabergServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishes([__DIR__ . '/../config/laraberg.php' => config_path('laraberg.php')], 'config');
        $this->publishes([__DIR__ . '/../resources/dist' => public_path('vendor/laraberg')], 'assets');

        if (config('laraberg.use_package_routes')) {
            $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        }
    }
    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->app->singleton(BlockTypeRegistry::class, fn() => BlockTypeRegistry::getInstance());
        $this->app->alias(ContentRenderer::class, 'laraberg.renderer');
        $this->app->alias(BlockParser::class, 'laraberg.parser');
        $this->app->alias(OEmbedService::class, 'laraberg.embed');
        $this->app->alias(BlockTypeRegistry::class, 'laraberg.registry');
    }
}

