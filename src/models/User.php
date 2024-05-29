<?php
// src/models/user.php

namespace Models;

use PDO;
use Config\Database;

class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $firstname;
    public $lastname;
    public $nickname;
    public $email;
    public $password; // Pour stocker le mot de passe en clair avant le hachage

    public function __construct() {
        $this->conn = Database::getInstance();
    }

    public function register() {
        $query = "INSERT INTO " . $this->table_name . " (firstname, lastname, nickname, email, password_hash) VALUES (:firstname, :lastname, :nickname, :email, :password_hash)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':nickname', $this->nickname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password_hash', password_hash($this->password, PASSWORD_BCRYPT));

        return $stmt->execute();
    }

    public function login() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($this->password, $user['password_hash'])) {
            return $user;
        }
        return false;
    }
}
?>
