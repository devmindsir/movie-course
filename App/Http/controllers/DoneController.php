<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Router;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Users;

class DoneController extends Controller
{
    public function show(int $order_id){
        $order=(new Orders())->find($order_id);
        $user_id=getSession('id');
        if (!$order->user_id===$user_id){
            (new Router())->abort();
        }
        $items=(new OrderItems)->getOrderIds($order_id);
        $user=(new Users)->find($user_id);

        $this->view('pages.done.show',[
            "order"=>$order,
            "items"=>$items,
            "user"=>$user
        ]);
    }

}