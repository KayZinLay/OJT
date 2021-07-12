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
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\PostList\PostListDaoInterface', 'App\Dao\PostList\PostListDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\PostList\PostListServiceInterface', 'App\Services\PostList\PostListService');
        
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
