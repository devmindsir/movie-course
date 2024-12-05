<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Models\Gift;
use App\Models\Orders;
use App\Services\PayService;
use Exception;

class PayController extends Controller
{

    public function pay()
    {
        $gateway = $_POST['gateway'] ?? null;
        if (!$gateway) {
            redirect('checkout');
        }
        try {
            $response=(new PayService)->processPayment($gateway);
            header("Location:".$response['link']);
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function callback(){
        $params=[
            'id' => $_POST['id'],
            'order_id' => $_POST['order_id']
        ];
        try {
            $order=(new Orders)->getRefID($params['id']);
            $gatewayId=$order['gateway'];
            $order_id=$order['id'];
            $response=(new PayService)->verifyPayment($params,$gatewayId);
            if(!is_null($order['gift_id'])){
                (new Gift())->updateGift($order['gift_id']);
            }
            (new Orders())->updatePay($response['id']);
            cart()->clear();
            redirect("done/show/$order_id");
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}