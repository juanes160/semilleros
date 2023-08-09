<?php
// Conexión a la base de datos

session_start();

include 'conexion.php';

// Procesamiento del formulario
$identificacion = $_POST['identificacion'];
$contrasena = $_POST['contrasena'];
//$contrasena = hash('sha512', $contrasena);

$validar_login = mysqli_query($conexion,"SELECT * FROM semillerista WHERE identificacion='$identificacion' and contrasena='$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $identificacion;
    include 'infpersonal.php';
}else{
    echo '
    <script>
        alert("Usuario no existe, por favor verifique los datos");
        window.location = "./loginsemillero.html"
    </script>
    ';
    exit;
}

?>
