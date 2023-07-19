<?php
class Database {
    private $host =  '185.98.131.109';
    private $database = 'ecfga2161548';
    private $username = 'ecfga2161548';
    private $password = 'tnpysdajgp';

    protected $connection;

    public function __construct() {
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>