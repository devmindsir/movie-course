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
        $data=[
            'name'=>$name,
            'username'=>$username,
            'email'=>$email,
            'phone'=>$phone,
            'password'=>password_hash($password, PASSWORD_BCRYPT),
        ];
        $this->insert($data);
    }

    public function getUserId(){
        $userId=Session::get('user_id')['id'];
        $sql="SELECT username,name,email,phone,id FROM $this->table WHERE id=?";
        return $this->db->doFetch($sql,[$userId],__CLASS__);
    }


}