<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'hamilton-9-so&sam';
    private $username = 'hamilton-9-so&sam';
    private $password = 'n5g6ijcUQRMDEeDv';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
