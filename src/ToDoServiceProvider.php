<?php

namespace ElephantsGroup\ToDo;

use Illuminate\Support\ServiceProvider;

class ToDoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/todo.php');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'todo');
        $this->loadViewsFrom(__DIR__ . '/Views', 'todo');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('todo', 'ElaphantsGroup\ToDo\ToDo');

        $config = __DIR__ . '/Config/todo.php';
        $this->mergeConfigFrom($config, 'todo');

        $this->publishes([__DIR__ . '/Config/todo.php' => config_path('todo.php')], 'config');

        $this->publishes([
            __DIR__ . '/Translations' => resource_path('lang/vendor/todo'),
        ]);

        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/todo'),
        ]);

        $this->publishes([
            __DIR__ . '/Assets' => public_path('vendor/todo'),
        ], 'public');

        $this->publishes([
            realpath(__DIR__ . '/Database/Migrations') => $this->app->databasePath() . '/migrations',
        ], 'migrations');
    }
}
