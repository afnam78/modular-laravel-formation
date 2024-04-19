<?php

namespace Modules\Publication\Exceptions;

use Exception;

class PublicationException extends Exception
{
    public static function errorCreatingPublication(): self
    {
        return new self('Error creating publication', 500);
    }

    public static function errorDeletingPublication(): self
    {
        return new self('Error deleting publication', 500);
    }
}
