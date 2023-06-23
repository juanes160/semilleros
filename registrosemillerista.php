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
    $identificacion = validarCampo($_POST['identificacion']);
    $contrasena = validarCampo($_POST['contrasena']);
    $codigoestudiantil = validarCampo($_POST['codigo_estudiantil']);
    $direccion = validarCampo($_POST['direccion']);
    $telefono = validarCampo($_POST['telefono']);
    $email = validarCampo($_POST['correo_electronico']);
    $genero = validarCampo($_POST['genero']);
    $fechanacimiento = validarCampo($_POST['fecha_de_nacimiento']);
    $semestre = validarCampo($_POST['semestre']);
    $codigomatricula = validarCampo($_POST['codigo_reporte_de_matricula']);
    $programaacademico = validarCampo($_POST['programa_academico']);
    $fechavinculacion = validarCampo($_POST['fecha_de_vinculacion']);
    $estado = validarCampo($_POST['estado']);

    // Realizar las validaciones necesarias para cada campo
    $errores = array();

    if (empty($nombres)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($identificacion)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($contrasena)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($codigoestudiantil)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($direccion)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($telefono)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($email)) {
        $errores[] = "Todos los campos son obligatorios";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El campo Correo Electrónico no es válido.";
    }

    if (empty($genero)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($fechanacimiento)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($semestre)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($codigomatricula)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($programaacademico)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($fechavinculacion)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($estado)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    // Validar que la identificación no se repita en la base de datos
    $sql = "SELECT identificacion FROM semillerista WHERE identificacion = '$identificacion'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $errores[] = "Ya existe un semillerista registrado con ese número de cédula";
    }

    // Verificar si hay errores
    if (count($errores) > 0) {
        foreach ($errores as $error) {
            echo $error . '<br>';
        }
    } else {
        // En este punto, todas las validaciones pasaron

        // Se encripta la contraseña
        $passwordhash = password_hash($contrasena, PASSWORD_DEFAULT);

        // Se ingresa la información a la base de datos
        $sql = "INSERT INTO semillerista VALUES ('$nombres', '$identificacion', '$passwordhash', '$codigoestudiantil', '$direccion', '$telefono', '$email', '$genero', '$fechanacimiento', '$semestre', '$codigomatricula', '$programaacademico', '$fechavinculacion', '$estado')";

        if ($conn->query($sql) === TRUE) {
            echo 'semillerista registrado satisfactoriamente';
            include 'loginsemillero.html';
        } else {
            echo 'Registro fallido';
            echo $conn->error;
        }
    }

    $conn->close();
}
?>
