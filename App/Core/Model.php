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
  public function all()
  {
    return $this->db->doSelect("SELECT * FROM `$this->table`", class: get_called_class());
  }

  public function find($id)
  {
    return $this->db->doFetch("SELECT * FROM `$this->table` WHERE id=?", [$id], get_called_class());
  }
}
