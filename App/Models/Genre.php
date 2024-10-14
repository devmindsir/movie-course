<?php

namespace App\Models;

use App\Core\Model;

class Genre extends Model
{
  protected $table = 'tbl_genres';

  public function __construct()
  {
    parent::__construct();
  }
}
