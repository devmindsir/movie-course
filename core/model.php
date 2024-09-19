<?php

//!Fetch Data
interface FetchInterface{
  public function fetchData($sql,$params=[],$fetch="");
}
class DatabaseFetcher extends Database implements FetchInterface{
  public function fetchData($sql,$params=[],$fetch=""){
    $pdo=$this->getConnection();
    try{
    $stmt=$pdo->prepare($sql);
    foreach($params as $key=>$value){
      $stmt->bindValue($key+1,$value);
    }
    $stmt->execute();
    if($fetch===''){
      return $stmt->fetchAll();
    }elseif($fetch==='fetch'){
      return $stmt->fetch();
    }
  }catch(PDOException $e){
    error_log($e->getMessage(),3,'./errors.log');
    echo "query Error=".$e->getMessage();
    return[];
  }
  }
}
$fetcher=new DatabaseFetcher('localhost','db_movie','root','');


?>