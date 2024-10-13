<?php

namespace App\Models;


use App\Core\Model;

class Actor extends Model
{
  protected $table = 'tbl_actors';
  public function __construct()
  {
    parent::__construct();
  }
}
