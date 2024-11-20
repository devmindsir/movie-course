<?php

namespace App\Exceptions;

use Exception;

class CategoryNotFoundException extends Exception
{
    private int $categoryId;

    public function __construct(int $categoryId, string $message = "Category not found", int $code = 404) {
        $this->categoryId = $categoryId;
        parent::__construct($message, $code);
    }
}
