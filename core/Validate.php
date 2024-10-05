<?php

namespace core;

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

  public function validateRegister($name, $family, $email, $password)
  {
    $this->errors = [];
    $this->validateFullName($name, $family);
    $this->validatePassword($password);
    $this->validateEmail($email);
    return $this->errors;
  }

  public function validateLogin($email, $password)
  {
    $this->errors = [];
    $this->validatePassword($password);
    $this->validateEmail($email);
    return $this->errors;
  }

  private function validateInput($title, $description, $image)
  {
    $this->errors = [];
    $this->validateField('title', $title, 2, 200);
    $this->validateField('description', $description, 5, 500);
    $this->validateField('image', $image, 4, 200);
  }

  private function validateFullName($name, $family)
  {
    $this->validateField('name', $name, 2, 40);
    $this->validateField('family', $family, 3, 60);
  }
  private function validatePassword($password)
  {
    $this->validateRequired('password', $password);
    $this->validateField('password', $password, 6, 60);
  }

  private function validateEmail($email)
  {
    $this->validateRequired('email', $email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->errors['email'] = 'Email format is invalid';
    }
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
