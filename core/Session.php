<?php

namespace core;

class Session
{
  public static function set($name, $value)
  {
    $_SESSION[$name] = $value;
  }

  public static function get($name)
  {
    return $_SESSION[$name] ?? false;
  }

  public static function setFlash($name, $value)
  {
    $_SESSION['_flash_'][$name] = $value;
  }

  public static function getFlash($name)
  {
    return $_SESSION['_flash_'][$name] ?? [];
  }

  public static function flash()
  {
    $_SESSION = [];
  }

  public static function unFlash()
  {
    unset($_SESSION['_flash_']);
  }

  public static function destroy()
  {

    self::flash();

    //!Step 2
    session_destroy();

    //!Step3
    $cookie = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly']);
  }
}
