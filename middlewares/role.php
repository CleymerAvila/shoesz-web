<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function requireRole(array $roles) {
    require '../../config/config.php';
    if (!isset($_SESSION['user_id'])) {
        header('Location: ' . $BASE_URL . 'views/users/loginRegister.php');
        exit;
    }

    $userRole = $_SESSION['user_role'] ?? '';

    if (!in_array($userRole, $roles)) {
        // No tiene permiso → redirigir
        if ($userRole === 'Cliente') {
            header('Location: '. $BASE_URL .'views/products/fullCatalog.php');
        } else {
            header('Location: ' . $BASE_URL);
        }
        exit;
    }
}
?>