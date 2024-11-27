<?php

namespace App\Http\Requests;

use App\Core\Validate;


class RegisterRequest extends BaseRequest
{
  protected $errors = [];

  public function validate(string $name ,string $username, string $email,mixed $password,string $phone)
  {
    Validate::resetError();
    Validate::validateFullName($name);
    Validate::validatePassword($password);
    Validate::validateRegexPassword($password);
    Validate::validateEmail($email);
    Validate::validateUserName($username);
    Validate::validatePhone($phone);
    $this->errors = Validate::getErrors();
    return $this;
  }
}
