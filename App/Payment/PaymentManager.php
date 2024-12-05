<?php

namespace App\Payment;

use App\Payment\Gateway\IDPayGateway;
use App\Payment\Gateway\MellatGateway;
use App\Payment\Gateway\SamanGateway;
use App\Payment\Gateway\ZarinpalGateway;
use Exception;

class PaymentManager
{
    protected $gateway=[];
    public function __construct()
    {
        $this->gateway=[
//            1=>ZarinpalGateway::class,
//            2=>SamanGateway::class,
//            3=>MellatGateway::class,
            4=>IDPayGateway::class,
        ];
    }
    public function getGateway(int $gateway,array $config){
        if (!isset($this->gateway[$gateway])){
            throw new Exception("Gateway With ID not found");
        }
        $gatewayClass=$this->gateway[$gateway];
        return new $gatewayClass($config);
    }
}