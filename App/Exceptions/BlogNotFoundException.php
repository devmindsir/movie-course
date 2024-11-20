<?php

namespace App\Exceptions;

use Exception;

class BlogNotFoundException extends Exception
{
    private int $blogId;

    public function __construct(int $blogId, string $message = "Blog not found", int $code = 404)
    {
        $this->blogId = $blogId;
        parent::__construct($message, $code);
    }
}
