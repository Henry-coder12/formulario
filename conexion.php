<?php
$servername = "localhost";
$username = "root"; // Cambiar si usas otro usuario
$password = "root"; // Cambiar si usas una contraseÃ±a
$dbname = "reclamos_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexiÃ³n: " . $conn->connect_error);
} else {
    echo "ConexiÃ³n exitosa.";
}
?>
