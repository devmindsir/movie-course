<?php

namespace App\Http\Requests;

use App\Core\Validate;

interface RequestInterface
{
  public function getError();
}

class RegisterRequest implements RequestInterface
{
  protected $errors = [];

  public function validate($name, $family, $email, $password)
  {
    Validate::resetError();
    Validate::validateFullName($name, $family);
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
