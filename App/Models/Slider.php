<?php

namespace App\Models;


use App\Core\Model;

class Slider extends Model
{
  protected $table = 'tbl_slider';

  public function __construct()
  {
    parent::__construct();
  }
}
