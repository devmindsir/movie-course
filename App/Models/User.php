<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
  protected $table = 'tbl_users';

  public function __construct()
  {
    parent::__construct();
  }
}
