<?php

namespace App\Providers;
use App\Repositories\TaskRepositoryInterface;
use App\Repositories\TaskRepository;
use App\Repositories\StatisticsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(TaskRepository::class, function ($app) {
            return new TaskRepository();
        });

        $this->app->singleton(StatisticsRepository::class, function ($app) {
            return new StatisticsRepository();
        });
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
