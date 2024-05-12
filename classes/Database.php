<?php
class Database
{
    protected $connection;

    public function __construct($host = 'localhost', $username = 'root', $password = '', $db_name = 'blog_1')
    {
        $this->connect($host, $username, $password, $db_name);
    }

    protected function connect($host, $username, $password, $db_name)
    {
        $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->connection = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            throw new RuntimeException('Connection failed: '. $e->getMessage(), 0, $e);
        }
    }

    public function closeConn()
    {
        $this->connection = null;
    }
}