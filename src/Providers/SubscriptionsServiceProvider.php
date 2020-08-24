<?php

namespace Swarovsky\Subscriptions\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class SubscriptionsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // use this if your package has views
        $this->loadViewsFrom(realpath(dirname(__DIR__, 1) . '/resources/views'), 'swarovsky-subscriptions');

        // use this if your package has lang files
        $this->loadTranslationsFrom(dirname(__DIR__, 1) . '/resources/lang', 'swarovsky-subscriptions');

        // use this if your package has routes
        $this->setupRoutes($this->app->router);
        $this->loadMigrationsFrom(dirname(__DIR__, 1).'/migrations');

        /*
        $this->mergeConfigFrom(
            dirname(__DIR__, 1).'/config/swarovsky-core.php', 'swarovsky-core'
        );
        */
    }

    /**
     * Define the routes for the application.
     *
     * @param Router $router
     * @return void
     */
    public function setupRoutes(Router $router): void
    {
        $router->group([
            'namespace' => 'Swarovsky\Subscriptions\Http\Controllers',
            'middleware' => ['web', 'auth']
        ], static function ($router) {
            require dirname(__DIR__, 1) . '/routes/web.php';
        });

        $router->group([
            'namespace' => 'Swarovsky\Subscriptions\Http\Controllers\Api',
            'middleware' => ['auth:api']
        ], static function ($router) {
            require dirname(__DIR__, 1) . '/routes/api.php';
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSkeleton();

//        $this->app['router']->aliasMiddleware('2fa', Google2FAMiddleware::class);
    }

    private function registerSkeleton(): void
    {
        $this->app->bind('swarovsky-subscriptions', static function ($app) {
            return new SubscriptionsServiceProvider($app);
        });
    }
}
