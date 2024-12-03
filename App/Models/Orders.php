<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Session;

class Orders extends Model
{
    protected $table = 'orders';

    public function insert(int $gatewayId)
    {
        $user_id = getSession('id');
        $gift = Session::get('total_cart') ?? null;
        $gift_price = null;
        $gift_id = null;
        if ($gift) {
            $gift_price = $gift['discountAmount'];
            $gift_id = $gift['code_id'];
        }
        $postPrice = Session::get('post')['postPrice'] ?? null;
        $totalAmount = cart()->getFinalPrice();
        $sql = "INSERT INTO $this->table
      (user_id,total_amount,status,gateway_id,gift_price,gift_id,post_price)
      VALUES (?,?,?,?,?,?,?)";
        $this->db->doQuery($sql, [$user_id, $totalAmount, 0, $gatewayId, $gift_price, $gift_id, $postPrice]);

        return $this->db->lastInsertId();
    }
}