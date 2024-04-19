<?php

namespace Modules\Comment\src\Presentation\API\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Comment\Exceptions\CommentException;
use Modules\Comment\src\Application\Contracts\CommentServiceInterface;
use Modules\Comment\src\Domain\Entities\Comment;
use Modules\Publication\Exceptions\PublicationException;
use Modules\Publication\src\Domain\Entities\Publication;
use Modules\Comment\src\Presentation\API\Request\DeleteCommentRequest;

class DeleteCommentController extends Controller
{
    public function __invoke(DeleteCommentRequest $request, CommentServiceInterface $service, Comment $comment): JsonResponse
    {
        try {
            $service->deleteComment($comment);
        } catch (CommentException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['message' => 'Comment deleted successfully']);

    }
}
