<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Session;

class Shipments extends Model
{
    protected $table = 'shipments';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(int $order_id)
    {
        $post = Session::get('post');
        $addressId = $post['addressID'];
        $shippingID = $post['shippingID'];
        $sql = "INSERT INTO $this->table
      (order_id,address_id,shipping_id,status_id)
      VALUES (?,?,?,?)";
        $this->db->doQuery($sql, [$order_id, $addressId, $shippingID, 1]);
    }
}