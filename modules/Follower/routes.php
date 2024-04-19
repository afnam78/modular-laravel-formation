<?php

use Illuminate\Support\Facades\Route;
use Modules\Follower\src\Presentation\API\Controller\ToggleFollowerController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('follower/create/{userToFollow}', ToggleFollowerController::class)->name('follower.toggle');
});
