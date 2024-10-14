<?php

namespace App\Http\Requests;

use App\Core\Validate;

class LoginRequest extends BaseRequest
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
}
