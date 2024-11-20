<?php

namespace  App\Core;


class Model
{
  protected $table = '';
  protected $db;

  public function __construct()
  {
    $this->db = new Database();
  }
  public function all(int $limit=null,string $order=null)
  {
    $sql="SELECT * FROM `$this->table` ";
      if ($order){
          $sql.="ORDER BY $order DESC ";
    }
    if ($limit){
        $sql.="LIMIT $limit";
    }
    return $this->db->doSelect($sql, class:get_called_class());
  }

  public function find($id)
  {
    return $this->db->doFetch("SELECT * FROM `$this->table` WHERE id=?", [$id], get_called_class());
  }

}
