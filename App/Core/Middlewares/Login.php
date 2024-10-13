<?php

namespace  App\Core\Middlewares;

use  App\Core\Session;

class Login
{

  public function handle()
  {
    if (!Session::get('user_id')) {
      redirect('login');
    }
  }
}
