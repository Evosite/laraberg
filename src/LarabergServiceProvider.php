<?php

namespace Evosite\Laraberg;

use Evosite\Laraberg\Blocks\BlockParser;
use Evosite\Laraberg\Blocks\BlockTypeRegistry;
use Evosite\Laraberg\Blocks\ContentRenderer;
use Evosite\Laraberg\Services\OEmbedService;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LarabergServiceProvider extends PackageServiceProvider
{

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laraberg')
            ->hasConfigFile()
            ->hasRoute('web')
            ->hasAssets();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function registeringPackage()
    {
        $this->app->singleton(BlockTypeRegistry::class, fn() => BlockTypeRegistry::getInstance());
        $this->app->alias(ContentRenderer::class, 'laraberg.renderer');
        $this->app->alias(BlockParser::class, 'laraberg.parser');
        $this->app->alias(OEmbedService::class, 'laraberg.embed');
        $this->app->alias(BlockTypeRegistry::class, 'laraberg.registry');
    }
}

