<?php

namespace  App\Core;

use PDO;
use PDOException;


interface DatabaseInterface
{
  public function getConnection();
  public function doSelect($sql, $params = [], $class);
  public function doFetch($sql, $params = [], $class);
  public function doQuery($sql, $params = []);
}
class Database implements DatabaseInterface
{
  private $pdo;
  public function __construct(private $host = 'localhost', private $db = 'db_movie', private $username = 'root', private $password = '', private $charset = "utf8mb4")
  {
    $this->connect();
  }
  private function connect()
  {
    $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
      $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
    } catch (PDOException $e) {
      echo "an Error accord:" . $e->getMessage();
    }
  }
  public function getConnection()
  {
    return $this->pdo;
  }

  //!prepare & Execute
  private function executeQuery($sql, $params = [], $fetchMode = null, $class = null)
  {
    try {
      $stmt = $this->pdo->prepare($sql);

      foreach ($params as $key => $value) {
        $stmt->bindValue($key + 1, $value);
      }

      if ($class) {
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
      }
      $stmt->execute();
      if ($fetchMode === 'fetchAll') {
        return $stmt->fetchAll();
      } elseif ($fetchMode === 'fetch') {
        return $stmt->fetch();
      }
    } catch (PDOException $e) {
      error_log($e->getMessage(), 3, './errors.log');
      echo "query Error=" . $e->getMessage();
      return [];
    }
  }
  //!fetch All
  public function doSelect($sql, $params = [], $class = __CLASS__)
  {
    return $this->executeQuery($sql, $params, 'fetchAll', $class);
  }
  //!fetch
  public function doFetch($sql, $params = [], $class = __CLASS__)
  {
    return $this->executeQuery($sql, $params, 'fetch', $class);
  }
  //!query
  public function doQuery($sql, $params = [])
  {
    return $this->executeQuery($sql, $params);
  }
}
