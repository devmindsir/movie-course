<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Users;

class OTPController extends Controller
{

    public function index()
    {
        $info = Session::get('register_info');
        $phone = $info['phone'];
        $this->view("pages.otp.index", ["phone" => $phone]);

    }

    public function store()
    {
        $otp_code = implode('', $_POST['otp_code']);
        $otp_session = Session::get('register_info')['otp'];
        if (strlen($otp_code) !== 5) {
            Session::setFlash('toast', ['message' => 'کد تایید باید شامل 5 رقم باشد', 'status' => 'error']);
            redirect('otp');
        }
        if ($otp_code != $otp_session) {
            Session::setFlash('toast', ['message' => 'کد تایید وارد شده معتبر نمی باشد', 'status' => 'error']);
            redirect('otp');
        }
        //!Store
        $info = Session::get('register_info');

        $this->registerStore($info['name'], $info['username'], $info['email'], $info['phone'],
            $info['password']);

    }

    private function registerStore($name, $username, $email, $phone, $password)
    {
        (new Users())->setUser($name, $username, $email, $phone, $password);
        Session::setFlash('toast', ['message' => 'ثبت نام با موفقیت انجام شد', 'status' => 'success']);
        Session::remove('register_info');
        redirect('login');
    }


}