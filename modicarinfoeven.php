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
    $descripcionusu = $_POST["descripcion"];
    $lugarusu = $_POST["lugar"];
    $clasificacionusu = $_POST["clasificacion"];
    $fecha_iniciousu = $_POST["fecha_inicio"];
    $fecha_finusu = $_POST["fecha_fin"];


    // Actualizar la información en la base de datos
    $sql = "UPDATE eventos SET nombre='$nombreusu',descripcion='$descripcionusu',lugar='$lugarusu',clasificacion='$clasificacionusu',fecha_inicio='$fecha_iniciousu',fecha_fin='$fecha_finusu'"; // Cambia 'tabla_de_usuarios' y 'id' según tu estructura

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada exitosamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

// Cerrar la conexión

?>
