<?php

namespace  App\Core;

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


  public static function validateFullName($name)
  {
    self::validateField('name', $name, 3, 30);
    self::validateRegex('name', $name);
  }

  public static function validateUserName($username){
      self::validateRequired('username',$username);
      self::validateRegex('username',$username);
  }
  public static function validatePhone($phone){
      self::validateRequired('phone',$phone);
        $pattern='/^09\d{9}$/';
        if (!preg_match($pattern,$phone)){
            self::$errors['phone'] = 'phone number format is invalid';
        }
  }
  public static function validateRegex($fieldName, $value)
  {
    if (!preg_match('/^[a-zA-Z]+$/', $value)) {
      self::$errors[$fieldName] = 'must contain only letters and no special characters or numbers';
    }
  }
  public static function validatePassword($password)
  {
    self::validateRequired('password', $password);
    self::validateField('password', $password, 6, 60);
  }
  public static function validateRegexPassword($password)
  {
    $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\W_]).{6,60}$/';
    if (!preg_match($pattern, $password)) {
      self::$errors['password'] = 'Uppercase & LowerCase Letters & Number & special Characters';
    }
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
