<?php

namespace App\Services;

use App\Core\Controller;
use App\Core\Session;
use App\Helper\Cart;
use App\Models\Gift;

class checkoutService extends Controller
{

    public function checkPostSession(){
        $type=(new Cart())->hasProduct();
        $post=Session::get('post');
        if ($type){
            if (!$post){
                redirect('post');
            }
        }
    }




}