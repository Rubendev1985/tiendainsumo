<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$bd = 'bdtienda';
$port = 3320;

try {
    $conn = new mysqli($host, $user, $password, $bd, $port);
} catch (mysqli_connect_error $e) {
    die('Error de Conexion: ' . $e->getMessage());
}
?>