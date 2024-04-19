<?php

namespace Modules\Follower\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Follower\src\Application\Contracts\FollowerServiceInterface;
use Modules\Follower\src\Application\Services\FollowerService;
use Modules\Follower\src\Domain\Contracts\FollowerRepositoryInterface;
use Modules\Follower\src\Infrastructure\Repository\FollowerRepository;

class FollowerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->app->bind(
            FollowerServiceInterface::class,
            FollowerService::class
        );
        $this->app->bind(
            FollowerRepositoryInterface::class,
            FollowerRepository::class
        );

        $this->app->register(RouteServiceProvider::class);
    }
}
