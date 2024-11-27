<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Services\AuthService;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('pages.login.create');
    }

    public function store(){
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            //!Check User
            $data = (new AuthService())->checkUser($email, $password);
            $user = $data[0];
            $errors = $data[1];

            //!check Errors
            if (!empty($errors)) {
               $this->setSessionFlush($email,$errors);
            }

            // //!SET SESSION
           $this->setLogin($user);
        }
    }

    private function setSessionFlush($email,$errors){
        Session::setFlash('old', ['email' => $email]);
        Session::setFlash('errors', $errors);
        redirect('login');
    }

    private function setLogin($user){
        Session::set('user_id', ['id'=>$user->id,'name'=>$user->name]);
        Session::setFlash('toast',['message'=>'ورود موفقیت آمیز بود','status'=>'success']);
        redirect('dashboard');
    }



}