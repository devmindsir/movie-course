<?php

namespace App\Http\controllers\register;

use App\Core\Controller;
use App\Core\Session;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
  public function index()
  {
    $this->view('register.create', noNav: true);
  }

  public function store()
  {
    if (isset($_POST['name'])) {

      //!Get DATA
      $name = $_POST['name'];
      $family = $_POST['family'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      //!VALIDATE
      $errors = $this->validate($name, $family, $email, $password);

      //!Check Errors
      if (!empty($errors)) {
        $this->setSession($name, $family, $email, $errors);
      }

      //!Store
      (new User)->setUser($name, $family, $email, $password);
      $message = 'Registration was Successful';
      redirect('login', $message);
    }
  }

  private function setSession($name, $family, $email, $errors)
  {
    Session::setFlash('old', [
      'name' => $name,
      'family' => $family,
      'email' => $email
    ]);
    Session::setFlash('errors', $errors);
    redirect('register');
  }

  private function validate($name, $family, $email, $password)
  {
    $request = new RegisterRequest();
    $request->validate($name, $family, $email, $password)->getError();
    //!Check User
    $user = (new User)->getUser($email);
    if ($user) {
      $request->setError('email', 'This Email has already exist');
    }
    return $errors = $request->getError();
  }
}
