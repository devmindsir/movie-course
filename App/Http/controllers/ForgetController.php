<?php

namespace App\Http\controllers;

use App\Core\Authenticator;
use App\Core\Controller;
use App\Core\Session;
use App\Helper\SendSMS;

class ForgetController extends Controller
{

    public function index(){
        $this->view('pages.forget.index');
    }

    public function create(){
        $authenticator=new Authenticator();
        $phone=$_POST['phone'] ?? null;

        //!CHECK PHONE
        $user=$authenticator->getUserByPhone($phone);
        if (!$user){
            Session::setFlash('toast',['message'=>'همچین کاربری وجود ندارد','status'=>'error']);
            redirect('forget');
        }
        //!UPDATE PASSWORD
        $newPassword="Dev-".rand(100000,999999);
        $authenticator->resetPassword($user,$newPassword);
        //!SEND SMS
        (new SendSMS())->send($phone,$user->name,$newPassword,$user->email);
        Session::setFlash('toast',['message'=>'اطلاعات حساب کاربری برای شما ارسال شد','status'=>'success']);
        redirect('login');

    }

}