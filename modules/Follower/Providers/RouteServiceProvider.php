<?php

namespace Modules\Follower\Providers;

use App\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('api')
                ->group(__DIR__ . '/../routes.php');
        });
    }
}
