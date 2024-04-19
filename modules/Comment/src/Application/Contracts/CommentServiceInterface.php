<?php

namespace Modules\Comment\src\Application\Contracts;

use Modules\Comment\Exceptions\CommentException;
use Modules\Comment\src\Domain\Entities\Comment;

interface CommentServiceInterface
{
    /**
     * Create a new comment
     *
     * @param array $data
     * @return Comment
     * @throws CommentException
     */
    public function createComment(array $data): Comment;

    /**
     * Delete a comment
     *
     * @param Comment $comment
     * @return bool
     * @throws CommentException
     */
    public function deleteComment(Comment $comment): bool;
}
