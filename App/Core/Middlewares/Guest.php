<?php

namespace App\Core\Middlewares;

use App\Core\Session;
use App\Services\JwtService;

class Guest
{
  public function handle()
  {
    // $token = (new JwtService)->validateToken();
    // if ($token) {
    //   redirect('admin');
    // }
    if (Session::get('user_id')) {
      redirect('admin');
    }
  }
}
