<?php


$servername = "localhost";
$username = "root"; // El usuario por defecto de XAMPP es 'root'
$password = ""; // La contraseña por defecto de XAMPP es una cadena vacía
$dbname = "digital_circus";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>