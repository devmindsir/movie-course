<?php

namespace App\Http\controllers\login;

use App\Core\Session;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController
{
  public function index()
  {
    view('login/create');
  }
  public function login()
  {
    if (isset($_POST['email'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      //!Check User
      $data = (new User)->checkUser($email, $password);
      $user = $data[0];
      $errors = $data[1];

      //!check Errors
      if (!empty($errors)) {
        Session::setFlash('old', ['email' => $email]);
        Session::setFlash('errors', $errors);
        redirect('login');
      }

      //!SET SESSION
      Session::set('user_id', $user->id);
      redirect('admin');
      die();
    }
  }
  public function destroy()
  {
    Session::destroy();
    //!redirect
    redirect();
  }
}
