<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Address;
use App\Models\shipping_post;
use App\Models\Users;
use App\Services\checkoutService;
use App\Services\PostService;


class CheckoutController extends Controller
{
    public function index()
    {

        //!Check Valid
        $checkoutService = new checkoutService();
        $postService = new PostService();
        $postService->checkCart();
        $checkoutService->checkPostSession();

        //!GetInfo
        $userInfo = (new Users())->getUserId();
        $baskets = Session::get('cart');
        $postInfo = Session::get('post') ?? null;
        $address=null;
        $post=null;
        $postPrice=null;
        if ($postInfo){
        $address = (new Address())->find($postInfo['addressID']);
        $post = (new shipping_post())->find($postInfo['shippingID']);
         $postPrice=$postInfo['postPrice'];
         }
        $totalPrice=$checkoutService->getTotalPrice($postPrice);
    //!View
        $this->view('pages.checkout.index',
        ['user' => $userInfo,
        'baskets' => $baskets,
        'address' => $address,
        'post' => $post,
        'postPrice'=>$postPrice,
         'totalPrice'=>$totalPrice
        ]

        );
        }

}