<?php

namespace App\Payment;

abstract class PaymentGateway
{

    protected $gateway_id;
    protected $api_url;
    protected $api_key;
    protected $sandbox;

    public function __construct(array $config)
    {
        $this->gateway_id=$config['gateway_id'];
        $this->api_url=$config['api_url'];
        $this->api_key=$config['api_key'];
        $this->sandbox=$config['sandbox'];
    }

    abstract public function requestPayment(array $params,int $lastId);
    abstract public function verifyPayment(array $params);

    protected function sendRequest(array $params,string $url,string $api_key){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            "X-API-KEY:$api_key",
            "X-SANDBOX:$this->sandbox"
        ));

        $result = curl_exec($ch);
        $httpCode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            'response'=>json_decode($result,true),
            'http_code'=>$httpCode
        ];
    }

}

