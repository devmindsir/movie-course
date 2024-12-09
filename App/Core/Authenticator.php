<?php

namespace App\Core;

use App\Models\Users;
use App\Services\JwtService;

class Authenticator
{
    public function check():bool
    {
    if (Session::get('user_id')){
        return true;
    }
    return $this->handleRememberMe();
   }

    private function handleRememberMe(){
        $getCookie=Cookie::get('remember_me');
        if (!$getCookie){
            return false;
        }
        $email=(new JwtService)->validateToken($getCookie);
        if (!$email){
            return false;
        }
        $user=$this->getUserByEmail($email);
        if (!$user){
            return false;
        }
        $this->setSession($user);
        return true;
    }

    public function getUserByEmail($email){
        return (new Users())->getUser($email);
    }

    public function getUserByPhone($phone){
        return (new Users())->checkPhone($phone);
    }

    public function login(string $email,string $password,int $remember=null){
    //!STEP 1 ---check email & password=user
    $user=$this->authenticate($email,$password);
    if (!$user){
        return ['success'=>false,'email'=>'ایمیل یا رمز عبور اشتباه است'];
    }

   //!STEP 2 ---- SET SESSION
    $this->setSession($user);

   //!STEP3 ---- SET COOKIE
    if ($remember){
        $this->setRemebmberMeCookie($user);
    }
    //!STET4 --- return
    return ['success'=>true];
    }

    private function authenticate(string $email,string $password){
        $user=$this->getUserByEmail($email);
        if ($user && password_verify($password,$user->password)){
            return $user;
        }
        return null;
    }

    public function setSession($user){
        Session::set('user_id', ['id' => $user->id, 'name' => $user->name]);
    }
    public function setRemebmberMeCookie($user){
        $token=(new JwtService)->createToken($user);
        $time=time()+14*24*3600;
        Cookie::set('remember_me',$token,$time);
    }

    public function resetPassword($user,$newPassword){
        $hashPassword=password_hash($newPassword, PASSWORD_BCRYPT);
        (new Users())->update(['password'=>$hashPassword],['id'=>$user->id]);
    }

}