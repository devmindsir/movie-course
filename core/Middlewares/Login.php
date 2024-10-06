<?php

namespace core\Middlewares;

class Login
{

  public function handle()
  {
    if (!session_get('user_id')) {
      redirect('login');
    }
  }
}
