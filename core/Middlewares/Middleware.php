<?php

namespace Core\Middlewares;

use Core\Middlewares\Guest;
use Core\Middlewares\Login;

class Middleware
{
  const KEYS = [
    'guest' => Guest::class,
    'login' => Login::class
  ];

  public static function handle($key)
  {
    if (!$key) {
      return;
    }
    $Middlewares = self::KEYS[$key];
    if (!$Middlewares) {
      return;
    }
    (new $Middlewares)->handle();
  }
}
