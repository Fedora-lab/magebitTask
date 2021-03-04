<?php
class DbConnection
{

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'subscriptions_db';

    protected $connection;

    public function __construct()
    {

        if (!isset($this->connection)) {

            $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);

            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }
        }

        return $this->connection;
    }
}
