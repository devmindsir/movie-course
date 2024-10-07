<?php

namespace core;

class Validate
{

  protected static $errors = [];

  public static function getErrors()
  {
    return self::$errors;
  }

  public static function resetError()
  {
    self::$errors = [];
  }

  public static function validateInput($title, $description, $image)
  {
    self::validateField('title', $title, 2, 200);
    self::validateField('description', $description, 5, 500);
    self::validateField('image', $image, 4, 200);
  }

  public static function validateFullName($name, $family)
  {
    self::validateField('name', $name, 2, 40);
    self::validateField('family', $family, 3, 60);
  }
  public static function validatePassword($password)
  {
    self::validateRequired('password', $password);
    self::validateField('password', $password, 6, 60);
  }

  public static function validateEmail($email)
  {
    self::validateRequired('email', $email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      self::$errors['email'] = 'Email format is invalid';
    }
  }

  public static function validateField($fieldName, $fieldValue, $minLength, $maxLength)
  {
    if (trim(strlen($fieldValue)) < $minLength) {
      self::$errors[$fieldName] = ucfirst($fieldName) . " filed is required and Must be {$minLength} characters";
    }
    if (trim(strlen($fieldValue)) > $maxLength) {
      self::$errors[$fieldName] = ucfirst($fieldName) . " It must not Exceed {$maxLength} characters";
    }
  }

  public static function validateRequired($fieldName, $fieldValue)
  {
    if (empty($fieldValue)) {
      self::$errors[$fieldName] = ucfirst($fieldName) . " field is required";
    }
  }
}
