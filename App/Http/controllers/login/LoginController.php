<?php

namespace App\Http\controllers\login;

use App\Core\Session;
use App\Models\User;
use App\Services\JwtService;

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

      //!FIREBASE START
      // (new JwtService)->createToken($user);
      // $this->validateToken();
      //!FIREBASE END

      // //!SET SESSION
      Session::set('user_id', $user->id);
      redirect('admin');
      die();
    }
  }

  // public function validateToken()
  // {
  //   $check = (new JwtService)->validateToken();
  //   if ($check) {
  //     redirect('admin');
  //   }
  //   redirect('login');
  // }
  public function destroy()
  {
    // (new JwtService)->destroyToken();
    Session::destroy();
    //!redirect
    redirect();
  }
}
