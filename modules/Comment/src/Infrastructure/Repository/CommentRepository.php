<?php

namespace Modules\Comment\src\Infrastructure\Repository;

use Modules\Comment\Exceptions\CommentException;
use Modules\Comment\src\Domain\Contracts\CommentRepositoryInterface;
use Modules\Comment\src\Domain\Entities\Comment;
use Modules\Publication\src\Domain\Entities\Publication;

class CommentRepository implements CommentRepositoryInterface
{
    /**
     * Create a new comment
     *
     * @param array $data
     * @return Comment
     * @throws CommentException
     */
    public function createComment(array $data): Comment
    {
        try {
            return Comment::create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
            throw CommentException::errorCreatingComment();
        }
    }

    /**
     * Delete a comment
     *
     * @param Comment $comment
     * @return bool
     * @throws CommentException
     */
    public function deleteComment(Comment $comment): bool
    {
        try {
            return $comment->delete();
        } catch (\Exception $e) {
            throw CommentException::errorDeletingComment();
        }
    }
}
