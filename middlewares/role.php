<?php
session_start();

function requireRole(array $roles) {
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../../views/users/loginRegister.php');
        exit;
    }

    $userRole = $_SESSION['user_role'] ?? '';

    if (!in_array($userRole, $roles)) {
        // No tiene permiso → redirigir
        if ($userRole === 'Cliente') {
            header('Location: ../../views/products/fullCatalog.php');
        } else {
            header('Location: ../../index.php');
        }
        exit;
    }
}
?>