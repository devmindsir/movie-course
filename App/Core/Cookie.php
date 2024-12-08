<?php

namespace App\Core;

class Cookie
{
    //!GET COOKIE
    public static function get($name){
        return $_COOKIE[$name] ?? null;
    }

    //!SET COOKIE
    public static function set($name,$value,$expireTime){
        $cookie = session_get_cookie_params();
        setcookie($name, $value, $expireTime, $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly']);
    }

    //!REMOVE COOKIE
    public static function remove($name){
        setcookie($name, '', time() - 3600);
    }
}