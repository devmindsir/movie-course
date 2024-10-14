<?php

namespace App\Http\Requests;

use App\Core\Validate;


class RegisterRequest extends BaseRequest
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
}
