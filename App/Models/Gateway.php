<?php

namespace App\Models;

use App\Core\Model;

class Gateway extends Model
{
    protected $table='gateway';

    public function __construct()
    {
        parent::__construct();
    }

    public function getGateway(){
        $sql="SELECT * FROM $this->table WHERE status=?";
        return $this->db->doSelect($sql,[1],__CLASS__);
    }

}