<?php

namespace App\Models;

use App\Core\Model;

class OrderItems extends Model
{
    protected $table = 'order_items';

    public function __construct()
    {
        parent::__construct();
    }

    public function insertOrderItems($item, $order_id)
    {
        $data = [
            'product_id' => $item['type'] === 'course' ? null : $item['id'],
            'course_id' => $item['type'] === 'course' ? $item['id'] : null,
            'color_id' => $item['type'] === 'course' ? null : $item['color_id'] ?? null,
            'title' => $item['title'],
            'order_id' => $order_id,
            'quantity' => $item['count'],
            'unit_price' => $item['price'],
            'unit_discount' => $item['discount']
        ];

        return $this->insert($data);
    }

    public function getOrderIds(int $order_id)
    {
        $sql = "SELECT * FROM $this->table WHERE order_id=?";
        return $this->db->doSelect($sql, [$order_id], __CLASS__);
    }


}