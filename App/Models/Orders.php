<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Session;
use Exception;

class Orders extends Model
{
    protected $table = 'orders';

    public function getRefID(string $refID){
        $sql="SELECT * FROM $this->table WHERE refID=? AND status=?";
        $result=$this->db->doFetch($sql,[$refID,0],__CLASS__);
        if (!$result){
            throw new Exception('Order with RefID not Found');
        }
        return ["gateway"=>$result->gateway_id,"id"=>$result->id,"gift_id"=>$result->gift_id];
    }

    public function insertOrder(int $gatewayId)
    {
        $gift = Session::get('total_cart') ?? null;
        $data=[
            'user_id'=>getSession('id'),
            'total_amount'=>cart()->getFinalPrice(),
            'status'=>0,
            'gateway_id'=>$gatewayId,
            'gift_price'=>$gift['discountAmount']??null,
            'gift_id'=>$gift['code_id']??null,
            'post_price'=>Session::get('post')['postPrice'] ?? null
        ];
        return $this->insert($data);

    }

    public function updateRefID($refID,$txCode,$orderId){
    $this->update(['refID'=>$refID,'transaction_code'=>$txCode],['id'=>$orderId]);
    }

    public function updatePay(string $refID){

        $this->update(['status'=>1],['refID'=>$refID,'status'=>0]);
    }





}