<?php

namespace RMS\Providers;
use Illuminate\Support\ServiceProvider;
use RMS\Aspect\LoggingAspect;
use Psr\Log\LoggerInterface;
/**
 * Class RootServiceProvider
 * @package RMS\Providers
 */
class RootServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LoggingAspect::class, function ($app) {
            return new LoggingAspect($app->make(LoggerInterface::class));
        });

        $this->app->tag([LoggingAspect::class], 'goaop.aspect');
    }
}
