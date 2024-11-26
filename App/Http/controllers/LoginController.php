<?php

namespace App\Http\controllers;

use App\Core\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('pages.login.create');
    }
}