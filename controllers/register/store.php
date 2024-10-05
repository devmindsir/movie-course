<?php

require(BASE_PATH . "core/model.php");

if (isset($_POST['name'])) {

  //!Get DATA
  $name = $_POST['name'];
  $family = $_POST['family'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  //!VALIDATE
  $validate = new core\Validate();
  $errors = $validate->validateRegister($name, $family, $email, $password);

  //!Check Errors
  if (!empty($errors)) {
    require(BASE_PATH . 'views/register/create_view.php');
    die();
  }

  //!Check User
  $user = $fetcher->fetchData("SELECT * FROM `tbl_users` WHERE email=?", [$email], 'fetch');
  if ($user) {
    $message = "This Email has already exist";
    redirect('register', $message);
  }


  //!Store
  $password_hash = password_hash($password, PASSWORD_BCRYPT);
  $user = $fetcher->setData("INSERT INTO `tbl_users` (`name`,`family`,`email`,`password`) VALUES (?,?,?,?)", [$name, $family, $email, $password_hash]);
  $message = 'Registration was Successful';
  redirect('login', $message);
}
