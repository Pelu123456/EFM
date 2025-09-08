<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Services\Contracts\BaseServiceInterface;
use App\Services\Implementations\BaseService;

use App\Services\Contracts\AuthServiceInterface;
use App\Services\Implementations\AuthService;
use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Repositories\Eloquent\AuthRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(BaseServiceInterface::class, BaseService::class);
        $this->app->bind(AuthServiceInterface::class,AuthService::class);
        $this->app->bind(AuthRepositoryInterface::class,AuthRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
