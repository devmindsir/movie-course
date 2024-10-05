<?php

require(BASE_PATH . "core/model.php");

if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  //!VALIDATE
  $validate = new core\Validate();
  $errors = $validate->validateLogin($email, $password);

  //!check Errors
  if (!empty($errors)) {
    require(BASE_PATH . 'views/login/create_view.php');
    die();
  }

  //!Check User
  $user = $fetcher->fetchData("SELECT * FROM `tbl_users` WHERE email=?", [$email], 'fetch');
  if (!$user) {
    $errors['email'] = 'No User Found With this Email';
    require(BASE_PATH . 'views/login/create_view.php');
    die();
  }

  //!Check Password
  if (!password_verify($password, $user['password'])) {
    $errors['password'] = 'Incorrect Password';
    require(BASE_PATH . 'views/login/create_view.php');
    die();
  }

  //!SET SESSION
  session_set('user_id', $user['id']);
  redirect('admin');
  die();
}
