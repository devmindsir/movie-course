<?php

namespace App\Http\Requests;


class BaseRequest
{
  protected $errors = [];

  public function setError($name, $message)
  {
    $this->errors[$name] = $message;
  }

  public function getError()
  {
    return $this->errors;
  }
}
