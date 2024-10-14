<?php

namespace App\Http\Requests;

use App\Core\Validate;

class EditMovieRequest extends BaseRequest
{
  protected $errors = [];

  public function validate($title, $description, $image)
  {
    Validate::resetError();
    Validate::validateInput($title, $description, $image);
    $this->errors = Validate::getErrors();
    return $this;
  }
}
