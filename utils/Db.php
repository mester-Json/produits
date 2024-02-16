<?php

require_once "connect.db.php";

class Db extends PDO
{
    private string $host;
    private string $dbName;
    private string $user;
    private string $pass;

    public function __construct(string $host, string $dbName, string $user, string $pass)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->pass = $pass;
        parent::__construct(
            "mysql:host=$this->host;dbname=$this->dbName",
            $this->user,
            $this->pass
        );
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_ASSOC
        );
        $connection = "Connected to the database";
    }
}