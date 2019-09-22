<?php

namespace App\Providers;

use App\Observers\UserVoteOptionObserver;
use App\UserVoteOption;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
        UserVoteOption::observe(UserVoteOptionObserver::class);
    }
}
