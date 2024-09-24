<?php
class Validator
{
  private $errors = [];

  public function validateEdit($title, $description, $image)
  {
    $this->errors = []; // Reset errors

    $this->validateField('title', $title, 2, 250); // حداکثر 250 کاراکتر
    $this->validateField('description', $description, 2, 500); // حداکثر 500 کاراکتر
    $this->validateField('image', $image, 2);

    return $this->errors;
  }

  public function validateAdd($title, $description, $image, $genre, $actor)
  {
    $this->errors = []; // Reset errors

    $this->validateField('title', $title, 2, 250); // حداکثر 250 کاراکتر
    $this->validateField('description', $description, 2, 500); // حداکثر 500 کاراکتر
    $this->validateField('image', $image, 2);
    $this->validateRequired('genre', $genre);
    $this->validateRequired('actor', $actor);

    return $this->errors;
  }

  private function validateField($fieldName, $value, $minLength, $maxLength = null)
  {
    if (trim(strlen($value)) < $minLength) {
      $this->errors[$fieldName] = ucfirst($fieldName) . " field is required and must be at least $minLength characters.";
    }
    if ($maxLength !== null && trim(strlen($value)) > $maxLength) {
      $this->errors[$fieldName] .= " It must not exceed $maxLength characters."; // اضافه کردن پیام حداکثر طول
    }
  }

  private function validateRequired($fieldName, $value)
  {
    if (empty($value)) {
      $this->errors[$fieldName] = ucfirst($fieldName) . " field is required.";
    }
  }
}
