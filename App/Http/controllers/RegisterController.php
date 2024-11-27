<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Http\Requests\RegisterRequest;
use App\Models\Users;
use App\Services\AuthService;

class RegisterController extends Controller
{
public function index(){
    $this->view('pages.register.create');
}

    public function store()
    {
        if (isset($_POST['name'])) {

            //!Get DATA
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $phone = $_POST['phone'];

            //!VALIDATE
            $errors = (new AuthService())->validate($name, $username, $email, $password,$repassword,$phone);

            //!Check Errors
            if (!empty($errors)) {
                $this->setSession($name, $username, $email,$phone, $errors);
            }
            //!Store
            $this->registerStore($name, $username, $email,$phone, $password);
        }
    }

   private function setSession($name, $username, $email,$phone, $errors)
   {
       Session::setFlash('old', [
           'name' => $name,
           'username' => $username,
           'email' => $email,
           'phone'=>$phone
       ]);
       Session::setFlash('errors', $errors);
       redirect('register');
   }

   private function registerStore($name, $username, $email,$phone, $password){
       (new Users())->setUser($name, $username, $email,$phone, $password);
       Session::setFlash('toast', ['message'=>'ثبت نام با موفقیت انجام شد','status'=>'success']);
       redirect('login');
   }




}