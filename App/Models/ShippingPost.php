<?php

namespace App\Models;

use App\Core\Model;

class ShippingPost extends Model
{
    protected $table='shipping_post';
    public function __construct()
    {
        parent::__construct();
    }


}