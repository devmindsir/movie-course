<?php

namespace App\Models;

use App\Core\Model;
use App\Http\Requests\LoginRequest;

class User extends Model
{
  protected $table = 'tbl_users';

  public function __construct()
  {
    parent::__construct();
  }

  public function getUser($email)
  {
    return $this->db->doFetch("SELECT * FROM `tbl_users` WHERE email=?", [$email], __CLASS__);
  }

  public function checkUser($email, $password)
  {
    //!VALIDATE
    $request = new LoginRequest();
    $request->validate($email, $password);
    $user = $this->getUser($email);
    if (!$user) {
      $request->setError('email', 'No User Found With this Email');
    } elseif (!password_verify($password, $user->password)) {
      $request->setError('password', 'Incorrect Password');
    }
    $errors = $request->getError();
    return [$user, $errors];
  }

  public function setUser($name, $family, $email, $password)
  {
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    return $this->db->doQuery("INSERT INTO `tbl_users` (`name`,`family`,`email`,`password`) VALUES (?,?,?,?)", [$name, $family, $email, $password_hash]);
  }
}
