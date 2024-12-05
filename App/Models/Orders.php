<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Session;
use Exception;

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

    public function updateRefID($refID,$txCode,$orderId){
    $sql="UPDATE $this->table SET refID=?,transaction_code=? WHERE id=?";
    $this->db->doQuery($sql,[$refID,$txCode,$orderId]);
    }

    public function getRefID(string $refID){
        $sql="SELECT * FROM $this->table WHERE refID=? AND status=?";
        $result=$this->db->doFetch($sql,[$refID,0],__CLASS__);
        if (!$result){
            throw new Exception('Order with RefID not Found');
        }
        return ["gateway"=>$result->gateway_id,"id"=>$result->id,"gift_id"=>$result->gift_id];
    }

    public function updatePay(string $refID){
        $sql="UPDATE $this->table SET status=? WHERE refID=? AND status=?";
        $this->db->doQuery($sql,[1,$refID,0]);
    }





}