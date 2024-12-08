<?php

namespace App\Helper;

use Dotenv\Dotenv;
use SoapClient;


class SendSMS
{
    private $username;
    private $password;
    private $otp_pattern;
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(BASE_PATH);
        $dotenv->load();
        $this->username = $_ENV['SMS_USERNAME'];
        $this->password = $_ENV['SMS_PASSWORD'];
        $this->otp_pattern = $_ENV['OTP_PATTERN'];
    }

    public function send($phone,$name,$code){
        $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
        $user = $this->username;
        $pass = $this->password;

        $fromNum = "+983000505";
        $toNum = array($phone);

        $pattern_code = $this->otp_pattern;
        $input_data = array( "name" =>$name ,"code" => $code);

        echo $client->sendPatternSms($fromNum,$toNum,$user,$pass,$pattern_code,$input_data);
    }

}