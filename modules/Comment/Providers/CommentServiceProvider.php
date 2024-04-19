<?php

namespace Modules\Comment\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Comment\src\Application\Contracts\CommentServiceInterface;
use Modules\Comment\src\Application\Service\CommentService;
use Modules\Comment\src\Domain\Contracts\CommentRepositoryInterface;
use Modules\Comment\src\Infrastructure\Repository\CommentRepository;

class CommentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->app->bind(
            CommentServiceInterface::class,
            CommentService::class
        );
        $this->app->bind(
            CommentRepositoryInterface::class,
            CommentRepository::class
        );

        $this->app->register(RouteServiceProvider::class);
    }
}
