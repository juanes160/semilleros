<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "semillerosudenar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del registro a eliminar

// Consulta para eliminar el registro
$sql = "DELETE FROM proyecto WHERE codigo=codigo";

if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado exitosamente.";
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

$conn->close();
?>
