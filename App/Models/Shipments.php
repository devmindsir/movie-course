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

    public function insertShipments(int $order_id)
    {

        $post = Session::get('post');
        $data=[
            'order_id'=>$order_id,
            'address_id'=>$post['addressID'],
            'shipping_id'=>$post['shippingID'],
            'status_id'=>1
        ];

        $this->insert($data);
    }
}