<?php

namespace App\Services;

use App\Core\Controller;
use App\Core\Session;
use App\Helper\Cart;
use App\Models\Address;
use App\Models\ShippingPost;
use App\Models\Users;

class CheckoutService extends Controller
{
    //!Check Post
    public function checkPostSession()
    {
        $type = (new Cart())->hasProduct();
        $post = Session::get('post');
        if ($type) {
            if (!$post) {
                redirect('post');
            }
        }
    }
    //!Validate
    public function handleValidate(){
        $postService = new PostService();
        $postService->checkCart();
        $this->checkPostSession();
    }

    //!CheckInfo
    public function handleInfo():array{
        //!get First Info
        $userInfo = (new Users())->getUserId();
        $baskets = Session::get('cart');
        $postInfo = Session::get('post') ?? null;

        //!set Data
        $data=[
            'user' => $userInfo,
             'baskets' => $baskets,
             'address' => null,
             'post' => null,
             'postPrice'=>0,
             'totalPrice'=>0
        ];

        //!Check Type Product
        if ($postInfo){
            $data['address'] = (new Address())->find($postInfo['addressID']);
            $data['post'] = (new ShippingPost())->find($postInfo['shippingID']);
            $data['postPrice']=$postInfo['postPrice'];
        }
        $data['totalPrice']=cart()->getTotalPrice()+$data['postPrice'];

        //!Return
        return $data;
    }

    function checkValidCode($checkCode){
        if (!$checkCode){
            echo json_encode([
                'success'=>false,
                'message'=>'کد تخفیف نامعتبر است'
            ]);
            exit();
        }
    }

    function checkUserCode($checkCode){
        $user_id=Session::get('user_id')['id'];

        if ($checkCode->user_id){
            if ($checkCode->user_id !=$user_id){
                echo json_encode([
                    'success'=>false,
                    'message'=>'این کد تخفیف متعلق به شخص شما نیست دوست عزیز!'
                ]);
                exit();
            }
        }
    }

    function checkDiscountAmount($totalPrice,$checkCode){
        $discountAmount=$totalPrice*($checkCode->discount/100);
        if ($discountAmount>$checkCode->most_price){
            $discountAmount=$checkCode->most_price;
        }
        return $discountAmount;
    }

    function sessionCodeSet($discountCode,$checkCode,$discountAmount,$totalPrice,$post_price,$totalPay){
        Session::set('total_cart',[
            'code'=>$discountCode,
            'code_id'=>$checkCode->id,
            'code_discount'=>$checkCode->discount,
            'discountAmount'=>$discountAmount,
            'amount'=>$totalPrice,
            'post_price'=>$post_price,
            'total_price'=>$totalPay
        ]);

    }
    function resultCode($checkCode,$discountAmount,$totalPrice,$post_price,$totalPay){
        echo json_encode([
            'success' => true,
            'message' => 'کد تخفیف با موفقیت اعمال شد',
            'code_discount' => $checkCode->discount,
            'discountAmount' => $discountAmount,
            'amount' => $totalPrice,
            'post_price' => $post_price,
            'total_price' => $totalPay
        ]);
    }
}