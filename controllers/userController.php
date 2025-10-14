<?php
require_once '../config/config.php';
require_once '../config/db.php';
require_once '../models/User.php';

session_start();

$user = new User($conn);
$action = $_GET['action'] ?? '';

switch ($action) {
    case 'register':
        if ($_POST) {
            $user->register($_POST['name'], $_POST['email'], $_POST['password']);
            echo 'Registrado correctamente';
            header('Location: ' . $BASE_URL . 'views/users/loginRegister.php');
        } else {
            echo 'Error al registrar';
        }
        break;
    case 'login':
        if ($_POST) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $sql = "SELECT u.user_id, u.name, u.email, u.password_hash, r.name AS role_name 
                    FROM users u 
                    INNER JOIN user_roles ur ON u.user_id = ur.user_id 
                    INNER JOIN roles r ON ur.role_id = r.role_id 
                    WHERE u.email = :email 
                    AND r.name = :role
                    LIMIT 1";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($user && password_verify($password, $user['password_hash'])) {
                // Guardar sesión
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role_name']; // 👈 del join

                // Redirección según rol
                if ($user['role_name'] === 'Admin') {
                    header('Location: '. $BASE_URL . 'views/products/dashboard.php');
                } else {
                    header('Location: '. $BASE_URL . 'views/products/fullCatalog.php');
                }
                exit;
            } else {
                $_SESSION['error'] = "Credenciales inválidas";
                echo 'Invalid email or password';
                // header('Location: ../views/users/loginRegister.php');
                exit;
            }
        }
        break;
    case 'logout': {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'logout') {
            session_destroy();
            header('Location: ' . $BASE_URL);
            exit();
        }
    }
}
