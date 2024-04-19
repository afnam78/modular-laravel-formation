<?php

namespace Modules\Comment\src\Application\Service;

use Modules\Comment\Exceptions\CommentException;
use Modules\Comment\src\Application\Contracts\CommentServiceInterface;
use Modules\Comment\src\Domain\Contracts\CommentRepositoryInterface;
use Modules\Comment\src\Domain\Entities\Comment;

class CommentService implements CommentServiceInterface
{
    private $repository;
    public function __construct(CommentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return Comment
     * @throws CommentException
     */
    public function createComment(array $data): Comment
    {
        return $this->repository->createComment($data);
    }

    /**
     * @param Comment $comment
     * @return bool
     * @throws CommentException
     */
    public function deleteComment(Comment $comment): bool
    {
        return $this->repository->deleteComment($comment);
    }
}
