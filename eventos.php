<?php

$host = 'localhost';
$bd = 'semillerosudenar';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $bd);
if ($conn->connect_error) {
    echo 'conexion fallida';
    exit;
}

// Función para limpiar y validar los datos
function validarCampo($campo)
{
    $campo = trim($campo); // Elimina espacios en blanco al inicio y al final
    $campo = htmlspecialchars($campo); // Convierte caracteres especiales en entidades HTML
    return $campo;
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario y validarlos
    $codigo = validarCampo($_POST['codigo']);
    $nombre = validarCampo($_POST['nombre']);
    $descripcion = validarCampo($_POST['descripcion']);
    $fechainicio = validarCampo($_POST['fecha_inicio']);
    $fechafin = validarCampo($_POST['fecha_fin']);
    $lugar = validarCampo($_POST['lugar']);
    $tipo = validarCampo($_POST['tipo']);
    $modalidad = validarCampo($_POST['modalidad']);
    $clasificacion = validarCampo($_POST['clasificacion']);
    $observaciones = validarCampo($_POST['observaciones']);
       
    
    // Realizar las validaciones necesarias para cada campo
    $errores = array();

    if (empty($codigo)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($nombre)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($descripcion)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($fechainicio)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($fechafin)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($lugar)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($tipo)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($modalidad)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($clasificacion)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($observaciones)) {
        $errores[] = "Todos los campos son obligatorios";
    }

   

    // Validar que la identificación no se repita en la base de datos
    $sql = "SELECT codigo FROM eventos WHERE codigo = '$codigo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $errores[] = "Ya existe un coordinador registrado con ese número de cédula";
    }

    // Verificar si hay errores
    if (count($errores) > 0) {
        foreach ($errores as $error) {
            echo $error . '<br>';
        }
    } else {
        // En este punto, todas las validaciones pasaron

       
        // Se ingresa la información a la base de datos
        $sql = "INSERT INTO eventos VALUES ('$codigo', '$nombre', '$descripcion', '$fechainicio', '$fechafin', '$lugar', '$tipo', '$modalidad', '$clasificacion', '$observaciones')";

        if ($conn->query($sql) === TRUE) {
            echo 'evento registrado satisfactoriamente';
            include 'loginsemillero.html';
        } else {
            echo 'Registro fallido';
            echo $conn->error;
        }
    }

    $conn->close();
}
?>
