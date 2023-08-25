<?php
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
    $titulo = $_POST["titulo"];
    $tipoproyecto = $_POST["tipoproyecto"];
    $estado = $_POST["estado"];
    $fechainicio = $_POST["fechainicio"];
    $fechafinalizacion = $_POST["fechafinalizacion"];
    $propuesta = $_POST["propuesta"];


    // Actualizar la información en la base de datos
    $sql = "UPDATE proyecto SET titulo='$titulo',estado='$estado',fechainicio='$fechainicio',tipoproyecto='$tipoproyecto',fechafinalizacion='$fechafinalizacion',propuesta='$propuesta'"; // Cambia 'tabla_de_usuarios' y 'id' según tu estructura

    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada exitosamente";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

// Cerrar la conexión

?>
