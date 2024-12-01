<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Address;
use App\Models\Gift;
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
        $totalPrice=cart()->getTotalPrice()+$postPrice;
        }
    //!View
        $this->view('pages.checkout.index',
        ['user' => $userInfo,
        'baskets' => $baskets,
        'address' => $address,
        'post' => $post,
         'postPrice'=>$postPrice,
        'totalPrice'=>$totalPrice]);
        }


   public function create(){
        $inputData=json_decode(file_get_contents('php://input'),true);
        $discountCode=$inputData['code']??null;
        if (empty($discountCode)){
            return;
        }
        $checkCode=(new Gift())->checkCode($discountCode);

        //!check Valid
        if (!$checkCode){
            echo json_encode([
                'success'=>false,
                'message'=>'کد تخفیف نامعتبر است'
            ]);
            return;
        }

        //!check User
         $user_id=Session::get('user_id')['id'];
         if ($checkCode->user_id){
             if ($checkCode->user_id !=$user_id){
                 echo json_encode([
                     'success'=>false,
                     'message'=>'این کد تخفیف متعلق به شخص شما نیست دوست عزیز!'
                 ]);
                 return;
             }
         }

         //!check discountAmount
            $totalPrice=cart()->getTotalPrice();
            $discountAmount=$totalPrice*($checkCode->discount/100);
            if ($discountAmount>$checkCode->most_price){
                $discountAmount=$checkCode->most_price;
            }

            //!post_Price
            $post_price=Session::get('post')['postPrice'];

            //!calculate Total Price
            $totalPay=$totalPrice+$post_price-$discountAmount;

            //Set Session
            Session::set('total_cart',[
            'code'=>$discountCode,
            'code_discount'=>$checkCode->discount,
            'discountAmount'=>$discountAmount,
            'amount'=>$totalPrice,
            'post_price'=>$post_price,
            'total_price'=>$totalPay
            ]);

            echo json_encode([
                'success'=>true,
                'message'=>'کد تخفیف با موفقیت اعمال شد',
                'code_discount'=>$checkCode->discount,
                'discountAmount'=>$discountAmount,
                'amount'=>$totalPrice,
                'post_price'=>$post_price,
                'total_price'=>$totalPay
            ]);



        }

}