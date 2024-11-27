<?php

namespace App\Models;

use App\Core\Model;

class Address extends Model
{
    protected $table='address';
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserAddress(){
        $user_id=getSession('id');
        $sql="SELECT u.name,u.phone,a.* 
        FROM users u 
        JOIN address a
        ON u.id=a.user_id 
        WHERE u.id=?
        ";
        return $this->db->doSelect($sql,[$user_id],__CLASS__);
    }

}