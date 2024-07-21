<?php
namespace src\Main;

class DBConnect{
    private $connect = null;

    public function __construct(){
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db   = $_ENV['DB_DATABASE'];
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];

        try {
            $this->connect = new \PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getConnection(){
        return $this->connect;
    }
}