<?php
class Validate
{

  private $errors = [];

  public function validateEdit($title, $description, $image)
  {
    $this->validateInput($title, $description, $image);
    return $this->errors;
  }

  public function validateAdd($title, $description, $image, $genre, $actor)
  {
    $this->validateInput($title, $description, $image);
    $this->validateRequired('genre', $genre);
    $this->validateRequired('actor', $actor);
    return $this->errors;
  }

  private function validateInput($title, $description, $image)
  {
    $this->errors = [];
    $this->validateField('title', $title, 2, 200);
    $this->validateField('description', $description, 5, 500);
    $this->validateField('image', $image, 4, 200);
  }

  private function validateField($fieldName, $fieldValue, $minLength, $maxLength)
  {
    if (trim(strlen($fieldValue)) < $minLength) {
      $this->errors[$fieldName] = ucfirst($fieldName) . " filed is required and Must be {$minLength} characters";
    }
    if (trim(strlen($fieldValue)) > $maxLength) {
      $this->errors[$fieldName] = ucfirst($fieldName) . " It must not Exceed {$maxLength} characters";
    }
  }

  private function validateRequired($fieldName, $fieldValue)
  {
    if (empty($fieldValue)) {
      $this->errors[$fieldName] = ucfirst($fieldName) . " field is required";
    }
  }
}
