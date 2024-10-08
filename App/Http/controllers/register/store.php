<?php
//!use Class
use App\Http\Requests\RegisterRequest;
use core\Session;

require(BASE_PATH . "core/model.php");

if (isset($_POST['name'])) {

  //!Get DATA
  $name = $_POST['name'];
  $family = $_POST['family'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  //!VALIDATE
  $errors = (new RegisterRequest)->validate($name, $family, $email, $password)->getError();

  //!Check User
  $user = $fetcher->fetchData("SELECT * FROM `tbl_users` WHERE email=?", [$email], 'fetch');
  if ($user) {
    $errors['email'] = "This Email has already exist";
  }

  //!Check Errors
  if (!empty($errors)) {
    Session::setFlash('old', [
      'name' => $name,
      'family' => $family,
      'email' => $email
    ]);
    Session::setFlash('errors', $errors);
    redirect('register');
  }

  //!Store
  $password_hash = password_hash($password, PASSWORD_BCRYPT);
  $user = $fetcher->setData("INSERT INTO `tbl_users` (`name`,`family`,`email`,`password`) VALUES (?,?,?,?)", [$name, $family, $email, $password_hash]);
  $message = 'Registration was Successful';
  redirect('login', $message);
}
