<?php
class Database {
    private $host = 'localhost';
    private $port = '5432';
    private $db = 'postgres';
    private $user = 'postgres';
    private $pass = 'postgres@123';
    private $pdo;

    
    public function __construct() {
        $this->connect();
    }

    //conexão com o banco
    private function connect() {
        try {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->db}";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erro na conexão com o banco de dados: ' . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>
