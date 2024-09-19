<?php
interface DatabaseInterface{
public function getConnection();
}
class Database implements DatabaseInterface{
  private $host;
  private $db;
  private $username;
  private $password;
  private $charset;
  private $pdo;
  public function __construct($host,$db,$username,$password,$charset="utf8mb4"){
    $this->host=$host;
    $this->db=$db;
    $this->username=$username;
    $this->password=$password;
    $this->charset=$charset;
    $this->connect();
  }
  private function connect(){
    $dsn="mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
    $options=[
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try{
      $this->pdo=new PDO($dsn,$this->username,$this->password,$options);
    }catch(PDOException $e){
      echo "an Error accord:".$e->getMessage();
    }
  }
  public function getConnection(){
    return $this->pdo;
  }
}




?>