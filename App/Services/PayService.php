<?php

namespace App\Services;

use App\Core\Session;
use App\Models\Gateway;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Shipments;
use App\Models\Users;
use App\Payment\PaymentManager;

class PayService extends BaseService
{

    public function processPayment(int $gateway){

        //!Insert All Info
       $lastId= $this->InsertOrder($gateway);
       $this->InsertOrderItems($lastId);
       $this->InsertShipments($lastId);

       //!Get Payment Params
       $params=$this->getPaymentParams();

       //!get Config
        $config=$this->setPaymentConfig($gateway);

        //!get Gateway
        $gatewayInstance=(new PaymentManager())->getGateway($gateway,$config);

        return $gatewayInstance->requestPayment($params,$lastId);
    }


    public function verifyPayment(array $params,int $gateway){
        //!get Config
        $config=$this->setPaymentConfig($gateway);

        //!get Gateway
        $gatewayInstance=(new PaymentManager())->getGateway($gateway,$config);

        return $gatewayInstance->verifyPayment($params);
    }


    private function setPaymentConfig(int $gateway){
        $gatewayInfo=(new Gateway())->find($gateway);
        $config=[
            'gateway_id'=>$gateway,
            'api_url'=>$gatewayInfo->api_url,
            'api_key'=>$gatewayInfo->api_key,
            'sandbox'=>true,
        ];
        return $config;
    }
    private function getPaymentParams(){
        $txcode=mt_rand(100000,999999);
        $user=(new Users())->find(getSession('id'));
        $params = array(
            'order_id' => $txcode,
            'amount' => cart()->getFinalPrice(),
            'name' => $user->name,
            'phone' => $user->phone,
            'mail' => $user->email,
            'callback' => URL.'pay/callback',
        );
        return $params;
    }
    private function InsertOrder(int $gateway){
       return (new Orders)->insert($gateway);
    }
    private function InsertOrderItems(int $lastId){
        foreach (cart()->all() as $item) {
            (new OrderItems)->insert($item,$lastId);
        }
    }
    private function InsertShipments(int $lastId){
        $postCheck=Session::get('post')??null;
        if (!$postCheck){
            return;
        }
        (new Shipments)->insert($lastId);
    }



}