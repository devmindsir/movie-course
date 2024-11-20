<?php

namespace App\Exceptions;

use Exception;

class CourseNotFoundException extends Exception
{
    private int $courseId;

    public function __construct(int $courseId, string $message = "Course not found", int $code = 404)
    {
        $this->courseId = $courseId;
        parent::__construct($message, $code);
    }
}
