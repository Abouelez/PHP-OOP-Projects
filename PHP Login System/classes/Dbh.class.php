<?php

class Dbh
{
    private $serverName = "localhost";
    private $dbName = "loginSystemDB";
    private $username = "root";
    private $pwd = "";

    public function __construct($serverName = "localhost", $dbName = "loginSystemDB", $username = "root", $pwd = "")
    {
        $this->serverName = $serverName;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->pwd = $pwd;
        $this->dsn = "mysql:host=$this->serverName;dbname=$this->dbName";
    }
    protected function connect()
    {
        try {
            $pdo =  new PDO("mysql:host = $this->serverName;dbname=$this->dbName", $this->username, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();
            exit();
        }
        return $pdo;
    }
}
