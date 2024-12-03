<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Address;
use App\Models\Gateway;
use App\Models\Gift;
use App\Models\shippingPost;
use App\Models\Users;
use App\Services\CheckoutService;
use App\Services\PostService;


class CheckoutController extends Controller
{
    public function index()
    {
        //!Instanse Service
        $service = new CheckoutService();
        //!Check Valid
        $service->handleValidate();

        //!GetInfo
        $getInfo = $service->handleInfo();

        //!Get Gateway
        $gateway=(new Gateway())->getGateway();

        //!View
        $this->view('pages.checkout.index', array_merge($getInfo,['gateway'=>$gateway]));
    }

    public function create()
    {
        $service = new CheckoutService();

        $inputData = json_decode(file_get_contents('php://input'), true);
        $discountCode = $inputData['code'] ?? null;
        if (empty($discountCode)) {
            return;
        }
        $checkCode = (new Gift())->checkCode($discountCode);

        //!check Valid
        $service->checkValidCode($checkCode);
        //!check User
        $service->checkUserCode($checkCode);
        //!total Price
        $totalPrice = cart()->getTotalPrice();
        //!check discountAmount
        $discountAmount = $service->checkDiscountAmount($totalPrice, $checkCode);
        //!post_Price
        $post_price = Session::get('post')['postPrice'];
        //!calculate Total Price
        $totalPay = $totalPrice + $post_price - $discountAmount;
        //Set Session
        $service->sessionCodeSet($discountCode, $checkCode, $discountAmount, $totalPrice, $post_price, $totalPay);
        //!Return Ajax
        $service->resultCode($checkCode,$discountAmount,$totalPrice,$post_price,$totalPay);


    }

}