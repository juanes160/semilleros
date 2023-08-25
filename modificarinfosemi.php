<?php

session_start();

$identificacion=$_SESSION['id'];
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "semillerosudenar";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreusu = $_POST["nombre"];
    $emailusu = $_POST["email"];
    $descripcionusu = $_POST["descripcion"];
    $misionusu = $_POST["mision"];
    $visionusu = $_POST["vision"];


    // Actualizar la información en la base de datos
    $sql = "UPDATE semillero SET nombres_completos='$nombreusu',descripcion='$descripcionusu',mision='$misionusu',correo_electronico='$emailusu',vision='$visionusu'"; // Cambia 'tabla_de_usuarios' y 'id' según tu estructura

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada exitosamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

// Cerrar la conexión

?>
