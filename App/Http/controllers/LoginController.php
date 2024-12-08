<?php

namespace App\Http\controllers;

use App\Core\Authenticator;
use App\Core\Controller;
use App\Core\Session;
use App\Services\AuthService;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('pages.login.create');
    }

    public function store()
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $remember = $_POST['remember'] ?? null;

        //!check Errors
        $errors = (new AuthService())->validateLogin($email, $password);
        if (!empty($errors)) {
            $this->setSessionFlush($email, $errors);
        }

        //!CHECK USER
        $user = (new Authenticator)->login($email, $password, $remember);
        if (!$user['success']) {
            $this->setSessionFlush($email, ['email' => $user['email']]);
            redirect('login');
        }
        //!REDIRECT
        redirect('dashboard');

    }

    private function setSessionFlush($email, $errors)
    {
        Session::setFlash('old', ['email' => $email]);
        Session::setFlash('errors', $errors);
    }



}