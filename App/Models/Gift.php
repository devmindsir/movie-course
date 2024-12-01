<?php

namespace App\Models;

use App\Core\Model;

class Gift extends Model
{
    protected $table='gift';
    public function __construct()
    {
        parent::__construct();
    }

    public function checkCode(string $code){
        $currentTime=time();
        $sql="
        SELECT * FROM $this->table
        WHERE code=?
        AND status=1
        AND ? BETWEEN time_create AND (time_create + time_valid*3600)
        AND use_code<=use_valid
        ";
        return $this->db->doFetch($sql,[$code,$currentTime],__CLASS__);
    }

}