<?php

namespace App\Exceptions;

use Exception;

class TeacherNotFoundException extends Exception
{
    protected $teacherId;

    public function __construct($teacherId, $message = "Teacher not found", $code = 0, Exception $previous = null)
    {
        $this->teacherId = $teacherId;
        parent::__construct($message, $code, $previous);
    }

    public function getTeacherId()
    {
        return $this->teacherId;
    }
}
