<?php

namespace App\Http\Requests;

use App\Core\Validate;

class AddMovieRequest extends BaseRequest
{
  protected $errors = [];

  public function validate($title, $description, $image, $genre, $actor)
  {
    Validate::resetError();
    Validate::validateInput($title, $description, $image);
    Validate::validateRequired('genre', $genre);
    Validate::validateRequired('actor', $actor);
    $this->errors = Validate::getErrors();
    return $this;
  }
}
