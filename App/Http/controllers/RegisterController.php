<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Helper\SendSMS;
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
                $this->setSessionFlush($name, $username, $email,$phone, $errors);
                redirect('register');
            }

            //!CREATE RANDOM CODE (5)
            $otpCode=rand(10000,99999);

            //!SEND SMS
            (new SendSMS())->send($phone,$name,$otpCode);

            //!SET SESSION
            Session::set('register_info',
            [
              "name"=>$name,
              "username"=>$username,
              "password"=>$password,
              "email"=>$email,
              "phone"=>$phone,
               "otp"=>$otpCode
            ]);

            //!REDIRECT OTP
            redirect('otp');


        }
    }

   private function setSessionFlush($name, $username, $email,$phone, $errors)
   {
       Session::setFlash('old', [
           'name' => $name,
           'username' => $username,
           'email' => $email,
           'phone'=>$phone
       ]);
       Session::setFlash('errors', $errors);

   }





}