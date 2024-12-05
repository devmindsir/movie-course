<?php

namespace App\Models;

use App\Core\Model;

class OrderItems extends Model
{
    protected $table='order_items';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($item,$order_id){
        $product_id=null;
        $course_id=null;
        $color_id=null;
        if ($item['type']==='course'){
            $course_id=$item['id'];
        }else{
            $product_id=$item['id'];
            $color_id=$item['color_id'];
        }
        $title=$item['title'];
        $quantity=$item['count'];
        $unit_price=$item['price'];
        $unit_discount=$item['discount'];
       $sql = "INSERT INTO $this->table
      (product_id,course_id,title,color_id,order_id,quantity,unit_price,unit_discount)
      VALUES (?,?,?,?,?,?,?,?)";
        $this->db->doQuery($sql, [$product_id,$course_id,$title,$color_id,$order_id,$quantity,$unit_price,$unit_discount]);
    }

    public function getOrderIds(int $order_id){
        $sql="SELECT * FROM $this->table WHERE order_id=?";
        return $this->db->doSelect($sql,[$order_id],__CLASS__);
    }



}