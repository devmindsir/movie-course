<?php

namespace App\Services;

use App\Core\Controller;
use App\Helper\Cart;
use App\Models\shipping_post;

class PostService extends Controller
{

    public function checkCart(){
        $cart_count=cart()->getTotalCount();
        if ($cart_count<1){
            redirect('cart');
        }
    }

    public function checkProduct(){
    if (!cart()->hasProduct()){
        redirect('checkout');
    }
    }

    public function checkPostPrice(){
        $type_post=(new shipping_post())->all();
        $postSpecial=(new Cart())->calculatePostPrice('special');
        $postExpress=(new Cart())->calculatePostPrice('express');
        foreach ($type_post as $post){
            if ($post->id===1){
                $post->cost=$postSpecial;
            }elseif ($post->id===2){
                $post->cost=$postExpress;
            }
        }
        return $type_post;
    }

}