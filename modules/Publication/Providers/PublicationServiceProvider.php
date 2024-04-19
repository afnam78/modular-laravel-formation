<?php

namespace Modules\Publication\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Publication\src\Application\Contracts\PublicationServiceInterface;
use Modules\Publication\src\Application\Service\PublicationService;
use Modules\Publication\src\Domain\Contracts\PublicationRepositoryInterface;
use Modules\Publication\src\Infrastructure\Repository\PublicationRepository;

class PublicationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->app->bind(
            PublicationServiceInterface::class,
            PublicationService::class
        );
        $this->app->bind(
            PublicationRepositoryInterface::class,
            PublicationRepository::class
        );

        $this->app->register(RouteServiceProvider::class);
    }
}
