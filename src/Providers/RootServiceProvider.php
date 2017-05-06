<?php

namespace RMS\Providers;
use Illuminate\Support\ServiceProvider;
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
        $this->app->singleton(Request::class, function () {
            return $this->prepareRequest(Request::capture());
        });
    }
    /**
     * @return void
     */
    public function register()
    {


    }

    /**
     * Prepare the given request instance for use with the application.
     *
     * @param   Request $request
     * @return  Request
     */
    protected function prepareRequest(Request $request)
    {
        $request->setUserResolver(function () use ($request) {
            return \RMS\Auth\Service::getAuthInfo($request);
        });

        return $request;
    }

}
