<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Question;
use Route;

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
        Route::bind('slug', function($slug){
            $question = Question::where('slug', $slug) -> first();
            return $question ? $question : abort(404);
            /*
             * or
             * Route::bind('slug', function($slug){
             * return Question::where('slug', $slug)->first() ?? abort(404);
             * });
             */
        });
    }
}
