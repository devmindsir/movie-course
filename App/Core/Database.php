<?php

namespace App\Core;

use Dotenv\Dotenv;
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
    private $host;
    private $db;
    private $username;
    private $password;
    private $pdo;

    public function __construct(private $charset = "utf8mb4")
    {


        $dotenv = Dotenv::createImmutable(BASE_PATH);
        $dotenv->load();
        $this->host = $_ENV['HOST_NAME'];

        $this->db = $_ENV['DB_NAME'];
        $this->username = $_ENV['USERNAME'];
        $this->password = $_ENV['PASSWORD'];
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

    //!Last Insert ID
    public function lastInsertId(){
        return $this->pdo->lastInsertId();
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
            return $stmt;
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, BASE_PATH . 'storage/log/errors.log');
           (new Router)->abort(500);
            return [];
        }
    }

    //!fetch All
    public function doSelect($sql, $params = [], $class = null)
    {
        return $this->executeQuery($sql, $params, 'fetchAll', $class);
    }

    //!fetch
    public function doFetch($sql, $params = [], $class = null)
    {
        return $this->executeQuery($sql, $params, 'fetch', $class);
    }

    //!query
    public function doQuery($sql, $params = [])
    {
        return $this->executeQuery($sql, $params);
    }
    public function __debugInfo(){}


}
