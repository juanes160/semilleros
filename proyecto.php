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
    $titulo = validarCampo($_POST['titulo']);
    $integrantes = validarCampo($_POST['integrantes']);
    $tipoproyecto = validarCampo($_POST['tipoproyecto']);
    $estado = validarCampo($_POST['estado']);
    $fechainicio = validarCampo($_POST['fechainicio']);
    $fechafinalizacion = validarCampo($_POST['fechafinalizacion']);
    $propuesta = validarCampo($_POST['propuesta']);
   
       
    
    // Realizar las validaciones necesarias para cada campo
    $errores = array();

    if (empty($codigo)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($titulo)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($integrantes)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($tipoproyecto)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($estado)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($fechainicio)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($fechafinalizacion)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($propuesta)) {
        $errores[] = "Todos los campos son obligatorios";
    }


   

    // Validar que la identificación no se repita en la base de datos
    $sql = "SELECT codigo FROM proyecto WHERE codigo = '$codigo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $errores[] = "Ya existe un proyecto registrado con ese código";
    }

    // Verificar si hay errores
    if (count($errores) > 0) {
        foreach ($errores as $error) {
            echo $error . '<br>';
        }
    } else {
        // En este punto, todas las validaciones pasaron

       
        // Se ingresa la información a la base de datos
        $sql = "INSERT INTO proyecto VALUES ('$codigo', '$titulo', '$integrantes', '$tipoproyecto', '$estado', '$fechainicio', '$fechafinalizacion', '$propuesta')";

        if ($conn->query($sql) === TRUE) {
            echo 'proyecto registrado satisfactoriamente';
            include 'loginsemillero.html';
        } else {
            echo 'Registro fallido';
            echo $conn->error;
        }
    }

    $conn->close();
}
?>
