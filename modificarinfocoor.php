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
    $direccionusu = $_POST["direccion"];
    $telefonousu = $_POST["telefono"];
    $emailusu = $_POST["email"];
    $generousu = $_POST["genero"];
    $prog_acadusu = $_POST["prog_acad"];
    $area_cousu = $_POST["area_co"];


    // Actualizar la información en la base de datos
    $sql = "UPDATE coordinador SET nombres_completos='$nombreusu',direccion='$direccionusu',telefono='$telefonousu',correo_electronico='$emailusu',genero='$generousu',programa_academico='$prog_acadusu',area_conocimiento='$area_cousu' WHERE identificacion=$identificacion"; // Cambia 'tabla_de_usuarios' y 'id' según tu estructura

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada exitosamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

// Cerrar la conexión

?>
