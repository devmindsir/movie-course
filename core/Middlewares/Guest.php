<?php

namespace core\Middlewares;

use core\Session;

class Guest
{
  public function handle()
  {
    if (Session::get('user_id')) {
      redirect('admin');
    }
  }
}
