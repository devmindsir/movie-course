<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Session;
use App\Http\Requests\LoginRequest;
use Carbon\Carbon;

class Users extends Model
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }


    public function getUser($email)
    {
        return $this->db->doFetch("SELECT * FROM $this->table WHERE email=?", [$email], __CLASS__);
    }

    public function checkPhone($phone)
    {
        return $this->db->doFetch("SELECT * FROM $this->table WHERE phone=?", [$phone], __CLASS__);
    }


    public function setUser($name, $username, $email, $phone, $password)
    {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $date_register = Carbon::now()->format('Y-m-d H:i:s');
        return $this->db->doQuery("INSERT INTO $this->table
    (`name`,`username`,`email`,`phone`,`password`,`create_at`) VALUES (?,?,?,?,?,?)",
            [$name, $username, $email, $phone, $password_hash, $date_register]);
    }

    public function getUserId(){
        $userId=Session::get('user_id')['id'];
        $sql="SELECT username,name,email,phone,id FROM $this->table WHERE id=?";
        return $this->db->doFetch($sql,[$userId],__CLASS__);
    }


}