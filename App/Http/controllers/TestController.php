<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Router;

class TestController extends Controller
{

    public function index(){
//        $params = array(
//            'order_id' => '101',
//            'amount' => 10000,
//            'name' => 'قاسم رادمان',
//            'phone' => '09382198592',
//            'mail' => 'my@site.com',
//            'desc' => 'توضیحات پرداخت کننده',
//            'callback' => URL.'test/callback',
//        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-API-KEY: 6a7f99eb-7c20-4412-a972-6dfb7cd253a4',
            'X-SANDBOX: 1'
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        $data=json_decode($result);
        if ($data->id || $data->link){
            $refID=$data->id;
            $link=$data->link;
            header("Location:".$link);
        }else{
            (new Router())->abort(500);
        }

    }

    public function callback(){

        $params = array(
            'id' => $_POST['id'],
            'order_id' => $_POST['order_id']
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-API-KEY: 6a7f99eb-7c20-4412-a972-6dfb7cd253a4',
            'X-SANDBOX: 1',
        ));

        $result = curl_exec($ch);

        $responseCode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);
        $response=json_decode($result);
        echo $response->status;
        echo $responseCode;
        if ($responseCode==200 && $response->status==100){
            echo "UPDATE DATABASE";
        }else{
            echo "REDIRECT";
        }

    }

}