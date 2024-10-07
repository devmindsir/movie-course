<?php

namespace App\Http\Requests;

use core\Validate;

interface RequestInterface
{
  public function getError();
}

class AddMovieRequest implements RequestInterface
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
  public function getError()
  {
    return $this->errors;
  }
}
