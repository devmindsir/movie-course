<?php

namespace App\Http\controllers;

use App\Core\Controller;

class RegisterController extends Controller
{
public function index(){
    $this->view('pages.register.create');
}
}