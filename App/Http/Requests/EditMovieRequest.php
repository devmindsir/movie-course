<?php

namespace App\Http\Requests;

use App\Core\Validate;

interface RequestInterface
{
  public function getError();
}

class EditMovieRequest implements RequestInterface
{
  protected $errors = [];

  public function validate($title, $description, $image)
  {
    Validate::resetError();
    Validate::validateInput($title, $description, $image);
    $this->errors = Validate::getErrors();
    return $this;
  }
  public function getError()
  {
    return $this->errors;
  }
}
