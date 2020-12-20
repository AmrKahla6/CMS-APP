<?php

namespace App\Providers;

use App\Post;
use App\Setting;
use App\SiteContent;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('front.inc.header' , function($view)
        {
            $view->with('hello'    , SiteContent::select('content')->where('name' , 'hello')->first());
        });

        view()->composer('front.inc.footer' , function($view)
        {
            $view->with('posts'   , Post::select('id' , 'title' , 'description' , 'created_at' , 'image')->orderBy('created_at' , 'DESC')->paginate(2));
            $view->with('setting' , Setting::first());
            $view->with('head'    , SiteContent::select('content')->where('name' , 'head')->first());
            $view->with('latest1' , SiteContent::select('content')->where('name' , 'latest1')->first());
            $view->with('latest2' , SiteContent::select('content')->where('name' , 'latest2')->first());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
