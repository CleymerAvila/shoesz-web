<?php  
$host = "localhost";
$db = "shoesdb";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión a la base de datos establecida";
} catch (PDOException $e){
    die(json_encode(['error' => 'Error de conexión: ' . $e->getMessage()]));
}
?>