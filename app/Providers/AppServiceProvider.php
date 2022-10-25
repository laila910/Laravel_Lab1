<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
// use App\Jobs\ProneOldPostsJob;

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
        // Paginator::useBootstrapFive();
        // Paginator::useBootstrapFour();
        // Paginator::useBootstrapThree();
        Paginator::useBootstrap();
        // $this->app->bindMethod([ProcessPodcast::class, 'handle'], function ($job, $app) {
        //     return $job->handle($app->make(AudioProcessor::class));
        // });
    }
}
