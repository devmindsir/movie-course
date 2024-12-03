<?php

namespace App\Services;

use App\Core\Controller;
use App\Core\Router;
use App\Helper\Cart;
use App\Models\Address;
use App\Models\shippingPost;

class PostService extends Controller
{

    public function checkCart()
    {
        $cart_count = cart()->getTotalCount();
        if ($cart_count < 1) {
            redirect('cart');
        }
    }

    public function checkProduct()
    {
        if (!cart()->hasProduct()) {
            redirect('checkout');
        }
    }

    public function checkPostPrice()
    {
        $type_post = (new shippingPost())->all();
        $postSpecial = (new Cart())->calculatePostPrice('special');
        $postExpress = (new Cart())->calculatePostPrice('express');
        foreach ($type_post as $post) {
            if ($post->id === 1) {
                $post->cost = $postSpecial;
            } elseif ($post->id === 2) {
                $post->cost = $postExpress;
            }
        }
        return $type_post;
    }

    public function checkValidate(int $addressId, int $postId)
    {
        $address = (new Address())->find($addressId);
        $post = (new shippingPost())->find($postId);
        if (!$address || !$post) {
            (new Router())->abort();
        }
    }

    public function calculatePost(int $postId){
        $post = (new shippingPost())->find($postId);
        return (new Cart())->calculatePostPrice($post->type);
    }



}