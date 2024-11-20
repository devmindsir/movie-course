<?php

namespace App\Models;

use App\Core\Model;

class ProductColor extends Model
{
    protected $table = 'product_color';

    public function __construct()
    {
        parent::__construct();
    }
}