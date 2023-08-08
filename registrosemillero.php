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
    $nombres = validarCampo($_POST['nombres_completos']);
    $email = validarCampo($_POST['correo_electronico']);
    $descripcion = validarCampo($_POST['descripcion']);
    $mision = validarCampo($_POST['mision']);
    $vision = validarCampo($_POST['vision']);
    $valores = validarCampo($_POST['valores']);
    $objetivos = validarCampo($_POST['objetivos']);
    $lineainvestigacion = validarCampo($_POST['linea_investigacion']);
    $numeroresolucion = validarCampo($_POST['numero_resolucion']);
    $fechacreacion = validarCampo($_POST['fecha_creacion']);

    // Realizar las validaciones necesarias para cada campo
    $errores = array();

    if (empty($nombres)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($email)) {
        $errores[] = "Todos los campos son obligatorios";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El campo Correo Electrónico no es válido.";
    }

    if (empty($descripcion)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($mision)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($vision)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($valores)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($objetivos)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($lineainvestigacion)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($numeroresolucion)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($fechacreacion)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    // Validar que la identificación no se repita en la base de datos
    $sql = "SELECT numero_resolucion FROM semillero WHERE numero_resolucion = '$numeroresolucion'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $errores[] = "Ya existe un semillero registrado con ese número de resolucion";
    }

    // Verificar si hay errores
    if (count($errores) > 0) {
        foreach ($errores as $error) {
            echo $error . '<br>';
        }

    } else {
        // En este punto, todas las validaciones pasaron

        // Se ingresa la información a la base de datos
        $sql = "INSERT INTO semillero VALUES ('$nombres', '$email', '$descripcion', '$mision', '$vision', '$valores', '$objetivos', '$lineainvestigacion', '$numeroresolucion', '$fechacreacion')";

        if ($conn->query($sql) === TRUE) {
            echo 'semillero registrado satisfactoriamente';
            include 'loginsemillero.html';
        } else {
            echo 'Registro fallido';
            echo $conn->error;
        }
    }

    $conn->close();
}
?>
