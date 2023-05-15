<?php

namespace App\Providers;

use App\Models\newsEnglish;
use App\Models\newsHindi;
use App\Models\Post;
use App\Models\PostHindi;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view()->composer(['layouts.frontend.partial.footer'], function ($view) {
            $posts = Post::approved()->published()->latest()->orderBy('id', 'desc')->take(3)->get();
            $view->with('posts', $posts);
        });
    }
}
