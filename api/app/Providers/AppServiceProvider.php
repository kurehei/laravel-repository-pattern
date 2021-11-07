<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Posts\PostServiceInterface::class,
            function ($app) {
                return new \App\Services\Posts\PostService(
                    $app->make(\App\Repositories\Post\PostDataAccessRepositoryInterface::class),
                    $app->make(\App\Repositories\Tag\TagDataAccessRepositoryInterface::class)
                );
            },
        );

        $this->app->bind(\App\Repositories\Tag\TagDataAccessRepositoryInterface::class, \App\Repositories\Tag\TagDataAccessEQRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
