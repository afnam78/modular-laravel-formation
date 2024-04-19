<?php

use Illuminate\Support\Facades\Route;
use Modules\Publication\src\Presentation\API\Controller\CreatePublicationController;
use Modules\Publication\src\Presentation\API\Controller\DeletePublicationController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('publication/create', CreatePublicationController::class)->name('publication.create');
    Route::delete('publication/delete/{publication}', DeletePublicationController::class)->name('publication.delete');
});


