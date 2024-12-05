<?php

namespace App\Payment\Gateway;

use App\Models\Orders;
use App\Payment\PaymentGateway;
use Exception;

class IDPayGateway extends PaymentGateway
{

    public function requestPayment(array $params,int $lastId)
    {
        $response=$this->sendRequest($params,$this->api_url.'/v1.1/payment',$this->api_key);
        $txCode=$params['order_id'];
        if ($response['http_code']==201 && isset($response['response']['id'])){
            (new Orders)->updateRefID($response['response']['id'],$txCode,$lastId);
            return $response['response'];
        }
        throw new Exception('Error In Payment Request');

    }

    public function verifyPayment(array $params)
    {
        $response=$this->sendRequest($params,$this->api_url.'/v1.1/payment/verify',$this->api_key);
        if ($response['http_code']==200 && $response['response']['status']==100){
        return $response['response'];
        }
        throw new Exception('Error In Payment Verification');

    }

}