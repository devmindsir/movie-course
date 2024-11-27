<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Users;
use Couchbase\User;

class AuthService extends BaseService
{

    public function checkUser(string $email, string $password)
    {
        $userModel=new Users();
        //!VALIDATE
        $request = new LoginRequest();
        $request->validate($email, $password);
        $user = $userModel->getUser($email);
        if (!$user) {
            $request->setError('email', 'هیچ کاربری با این ایمیل یافت نشد');
        } elseif (!password_verify($password, $user->password)) {
            $request->setError('password', 'پسورد یا ایمیل شما اشتباه است');
        }
        $errors = $request->getError();
        return [$user, $errors];
    }

    public function validate(string $name, string $username, string $email, mixed $password,mixed $repasswrod,string $phone)
    {
        $request = new RegisterRequest();
        $request->validate($name, $username, $email, $password,$phone)->getError();
        if ($password!==$repasswrod) {
            $request->setError('password', 'passworod and repassword not match');
        }
        //!Check User Email
        $user = (new Users())->getUser($email);
        if ($user) {
            $request->setError('email', 'This Email has already exist');
        }
        //!Check User Phone
        $userPhone = (new Users())->checkPhone($phone);
        if ($userPhone) {
            $request->setError('phone', 'This phone has already exist');
        }
        return $request->getError();
    }


}