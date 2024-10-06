<?php

use core\Session;

require(BASE_PATH . "core/model.php");

if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  //!VALIDATE
  $validate = new core\Validate();
  $errors = $validate->validateLogin($email, $password);

  //!Check User
  $user = $fetcher->fetchData("SELECT * FROM `tbl_users` WHERE email=?", [$email], 'fetch');
  if (!$user) {
    $errors['email'] = 'No User Found With this Email';
  }
  //!Check Password
  if (!password_verify($password, $user['password'])) {
    $errors['password'] = 'Incorrect Password';
  }
  //!check Errors
  if (!empty($errors)) {
    Session::setFlash('errors', $errors);
    redirect('login');
  }

  //!SET SESSION
  session_set('user_id', $user['id']);
  redirect('admin');
  die();
}
