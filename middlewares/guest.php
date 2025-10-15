<?php 
if(!defined('BASE_PATH')) {
    require_once __DIR__ . '/../config/config.php';
}
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

$current_url = $_SERVER['REQUEST_URI'];

if (isset($_SESSION['user_id']) && strpos($current_url, 'loginRegister.php') !== false) {
    header('Location: '. $BASE_URL);
    exit();
}