<?php

use Illuminate\Support\Facades\Route;
use Modules\Comment\src\Presentation\API\Controller\CreateCommentController;
use Modules\Comment\src\Presentation\API\Controller\DeleteCommentController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('comment/{publication}/create', CreateCommentController::class)->name('comment.create');
    Route::delete('comment/delete/{comment}', DeleteCommentController::class)->name('comment.delete');
});


