<?php

namespace App\Http\controllers;

use App\Core\Controller;

class PostController extends Controller
{

    public function index(){
        $this->view('pages.post.index');
    }
}