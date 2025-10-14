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
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $hashedPassword]);

        $userId = $this->conn->lastInsertId();

        // Agregar rol al usuario
        $this->conn->prepare("INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)")->execute([$userId, 2]);

        return $userId;

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
