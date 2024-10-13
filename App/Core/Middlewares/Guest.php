<?php

namespace App\Core\Middlewares;

use App\Core\Session;

class Guest
{
  public function handle()
  {
    if (Session::get('user_id')) {
      redirect('admin');
    }
  }
}
