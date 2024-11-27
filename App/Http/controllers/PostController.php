<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Models\Address;
use App\Models\shipping_post;

class PostController extends Controller
{
    public function index()
    {
        $getAddress = (new Address())->getUserAddress();
        $type_post=(new shipping_post())->all();
        $this->view('pages.post.index',['address'=>$getAddress,'posts'=>$type_post]);
    }
}