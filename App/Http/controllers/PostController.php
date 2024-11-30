<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Helper\Cart;
use App\Models\Address;
use App\Models\shipping_post;
use App\Services\PostService;

class PostController extends Controller
{
    public function index()
    {
        $service=new PostService();
        $service->checkCart();
        $service->checkProduct();
        $type_post=$service->checkPostPrice();
        $getAddress = (new Address())->getUserAddress();
        $this->view('pages.post.index',['address'=>$getAddress,'posts'=>$type_post]);
    }
}