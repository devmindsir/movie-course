<?php

namespace  App\Core\Middlewares;

use  App\Core\Session;
use App\Services\JwtService;

class Login
{

  public function handle()
  {
    // $token = (new JwtService)->validateToken();
    // if (!$token) {
    //   redirect('login');
    // }
    if (!Session::get('user_id')) {
      redirect('login');
    }
  }
}
