<?php

namespace App\Http\Requests;

use App\Core\Validate;

interface RequestInterface
{
  public function getError();
}

class LoginRequest implements RequestInterface
{
  protected $errors = [];
  public function validate($email, $password)
  {
    Validate::resetError();
    Validate::validatePassword($password);
    Validate::validateEmail($email);
    $this->errors = Validate::getErrors();
    return $this;
  }

  public function getError()
  {
    return $this->errors;
  }
}
