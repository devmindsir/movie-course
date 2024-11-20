<?php

namespace App\Models;

use App\Core\Model;

class ProductGallery extends Model
{
    protected $table='product_gallery';

    public function __construct()
    {
        parent::__construct();
    }

    public function getProductGallery(int $product_id):array{
        $sql="SELECT * FROM $this->table WHERE product_id=?";
        return $this->db->doSelect($sql,[$product_id],__CLASS__);
    }

}