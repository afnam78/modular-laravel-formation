<?php

namespace Modules\Comment\Exceptions;

use Exception;

class CommentException extends Exception
{
    public static function errorCreatingComment(): self
    {
        return new self('Error creating comment', 500);
    }

    public static function errorDeletingComment(): self
    {
        return new self('Error deleting comment', 500);
    }
}
