<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Users;
use Couchbase\User;

class AuthService extends BaseService
{

    public function validateLogin(string $email, string $password)
    {
        //!VALIDATE
        $request = new LoginRequest();
        $request->validate($email, $password);
        return $request->getError();
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