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

  public function insert(array $data):int{

      $columns=implode(',',array_keys($data));
      $placeholders=implode(',',array_fill(0,count($data),'?'));
      $sql = "INSERT INTO $this->table ($columns)
      VALUES ($placeholders)";
      $this->db->doQuery($sql,array_values($data));
      return $this->db->lastInsertId();
  }

  public function update(array $data,array $condation):bool{
      $setPart=implode(',',array_map(fn($col)=>"$col=?",array_keys($data)));
      $wherePart=implode(' AND ',array_map(fn($col)=>"$col=?",array_keys($condation)));
      $sql="UPDATE $this->table SET $setPart WHERE $wherePart";
      $stmt=$this->db->doQuery($sql,array_merge(array_values($data),array_values($condation)));
      return $stmt->rowCount();
  }




}
