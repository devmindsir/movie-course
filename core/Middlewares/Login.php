<?php

namespace core\Middlewares;

use core\Session;

class Login
{

  public function handle()
  {
    if (!Session::get('user_id')) {
      redirect('login');
    }
  }
}
