<?php

namespace App\Models;

use App\Core\Model;

class ProductSpecial extends Model
{
    protected $table='product_special';
    public function __construct()
    {
        parent::__construct();
    }

    public function getSpecialInfo(int $product_id):object{

        $sql="SELECT * FROM $this->table WHERE `product_id`=?";
        return $this->db->doFetch($sql,[$product_id],__CLASS__);

    }

}