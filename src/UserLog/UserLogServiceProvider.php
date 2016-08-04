<?php

namespace Jlxh\UserLog;

/*
 * This file is part of Entrust,
 * a userlog management solution for Laravel.
 *
 * @license MIT
 * @package Jlxh\UserLog
 */

use Illuminate\Support\ServiceProvider;

class UserLogServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('userlog.php'),
        ]);

        // Register commands
        $this->commands('command.userlog.migration');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerUserLog();

        $this->registerCommands();

        $this->mergeConfig();
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerUserLog()
    {
        $this->app->bind('userlog', function ($app) {
            return new UserLog($app);
        });
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->app->bindShared('command.userlog.migration', function ($app) {
            return new MigrationCommand();
        });
    }

    /**
     * Merges user's and userlog's configs.
     *
     * @return void
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'userlog'
        );
    }

    /**
     * Get the services provided.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.userlog.migration',
        ];
    }
}
