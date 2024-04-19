<?php

namespace Modules\Comment\src\Presentation\API\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Comment\Exceptions\CommentException;
use Modules\Comment\src\Application\Contracts\CommentServiceInterface;
use Modules\Comment\src\Presentation\API\Request\CreateCommentRequest;

class CreateCommentController extends Controller
{
    public function __invoke(CreateCommentRequest $request, CommentServiceInterface $service, int $publication): JsonResponse
    {
        try {
            $data = $request->safe()->only(['content']);
            $data['user_id'] = auth()->user()->id;
            $data['publication_id'] = $publication;
            $service->createComment($data);
        } catch (CommentException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['message' => 'Comment created successfully']);

    }
}
