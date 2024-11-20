<?php

namespace App\Exceptions;

use Exception;

class AuthorNotFoundException extends Exception
{
    private int $authorId;

    public function __construct(int $authorId, string $message = "Author not found", int $code = 404) {
        $this->authorId = $authorId;
        parent::__construct($message, $code);
    }
}
