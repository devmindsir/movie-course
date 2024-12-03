<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Shipments;

class PayController extends Controller
{

    public function pay()
    {
        $gateway = $_POST['gateway'] ?? null;
        if (!$gateway) {
            redirect('checkout');
        }

        //!Insert Order
        $lastId = (new Orders())->insert($gateway);
        //!Insert Order Items
        foreach (cart()->all() as $item) {
            (new OrderItems)->insert($item,$lastId);
        }
        //!Insert Shipments
        $postCheck=Session::get('post')??null;
        if ($postCheck){
            (new Shipments)->insert($lastId);
        }
    }
}