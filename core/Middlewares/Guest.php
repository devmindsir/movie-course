<?php

namespace core\Middlewares;

class Guest
{
  public function handle()
  {
    if (session_get('user_id')) {
      redirect('admin');
    }
  }
}
