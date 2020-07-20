<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

use App\Models\ExpertsCategory;
use App\Post;
use Laravelista\Comments\Comment;
use App\Review;
use App\Models\Service;

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
        View::composer('website.website', function($view){
            $view->with('categories', ExpertsCategory::with('children')->where('parent_id', 0)->get());
            $view->with('currentUser', Auth::user());
            $view->with('last_insert_id', DB::table('users')->latest()->first()->id);
        });

        View::composer('admin.admin', function($view){
            $view->with('newPosts', Post::where("new", 1)->count());
            $view->with('newComments', Comment::where("approved", 0)->count());
            $view->with('newReviews', Review::where("status", 0)->count());
            $view->with('newServices', Service::where("new", 1)->count());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }



}
