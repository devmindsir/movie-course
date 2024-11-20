<?php

namespace App\Models;

use App\Core\Model;

class Products extends Model
{
    protected $table='products';
    public function __construct()
    {
        parent::__construct();
    }

    public function productInfo(int $product_id):object|bool{
        $product=$this->find($product_id);
        if (!$product){
            return false;
        }
        $this->addProductColor($product);
        $this->addProductGaranti($product);
        return $product;
    }


    private function addProductColor(&$product){
        $colors=explode(',',$product->color);
        $all_color=array_map(function ($color){
            return $this->colorInfo($color);
        },$colors);
        $product->all_color=$all_color;
    }

    private function colorInfo(int $color):object{
        return (new ProductColor())->find($color);
    }


    private function addProductGaranti(&$product){
        $garantes=explode(',',$product->garanti);
        $all_garanti=array_map(function ($garanti){
            return $this->garanteInfo($garanti);
        },$garantes);
        $product->all_garanti=$all_garanti;
    }

    private function garanteInfo(int $garanti):object{
        return (new ProductGaranti())->find($garanti);
    }

    public function getProductCategory(int $id_category,int $product_id):array{
        $sql="SELECT * FROM $this->table WHERE `category_id`=? AND `id`!=?";
        return $this->db->doSelect($sql,[$id_category,$product_id],__CLASS__);
    }

}