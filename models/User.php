<?php
class User
{
    private $conn;
    private $table = 'users';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function register($name, $email, $password)
    {
        $sql = "INSERT INTO $this->table (name, email, password_hash) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        return $stmt->execute([$name, $email, $password_hash]);
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM $this->table WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password_hash'])) {
            return $user;
        }
        return false;
    }
}
