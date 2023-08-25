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
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $genero = $_POST["genero"];
    $semestre = $_POST["semestre"];
    $prog_acad = $_POST["prog_acad"];
    $estado = $_POST["estado"];

    // Actualizar la información en la base de datos
    $sql = "UPDATE semillerista SET nombres_completos='$nombre',direccion='$direccion',telefono='$telefono',correo='$email',genero='$genero',semestre='$semestre',programa_academico='$prog_acad',estado='$estado' WHERE identificacion=$identificacion"; // Cambia 'tabla_de_usuarios' y 'id' según tu estructura

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada exitosamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

// Cerrar la conexión

?>
