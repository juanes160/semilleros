<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="Estilo.css">

        <style>
        .menu{
	        list-style: none;
	        padding: 0;
	        background: #d6e8f8;
	        width: 90%;
	        max-width: 800px;
	        margin: auto;
            }

   
        .centrado {
            text-align: center;
            font-weight: bold; /* Agregamos negrita */
            font-size: 30px; /* Tamaño de fuente más grande */
            }

        
        </style>

       </head>
       <body>
        <ul class="menu">
            


            <?php
$servername = "localhost"; // Cambia esto si tu host es diferente
$username = "root";
$password = "";
$dbname = "semillerosudenar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

error_reporting(0);
$usuario=$_POST['identificacion'];
$contrasena=$_POST['contrasena'];

$_SESSION['identificacion']=$usuario;

$consulta ="SELECT * FROM semillerista where identificacion=$usuario and contrasena=$contrasena";

$sql = "SELECT identificacion, nombres_completos , correo , codigo_estudiantil ,direccion,telefono,genero,semestre,codigo_reporte_de_matricula,programa_academico,fecha_de_vinculacion,estado FROM semillerista WHERE identificacion = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombreUsuario = $row['nombres_completos'];
    $emailUsuario = $row['correo'];
    $idUsuario = $row['identificacion'];
    $codigo_est = $row['codigo_estudiantil'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $genero = $row['genero'];
    $fecha_naci = $row['fecha_de_nacimiento'];
    $semestre = $row['semestre'];
    $cod_matricula = $row['codigo_reporte_de_matricula'];
    $prog_acad = $row['programa_academico'];
    $fecha_vincu = $row['fecha_de_vinculacion'];
    $estado = $row['estado'];
?>


<p class="centrado">BIENVENIDO SEMILLERISTA</p>
<div>



<h1>Información del semillerista</h1>

    <p><strong>Nombre:</strong> <?php echo $nombreUsuario; ?></p>
    <p><strong>Email:</strong> <?php echo $emailUsuario; ?></p>
    <p><strong>Identificación:</strong> <?php echo $idUsuario; ?></p>
    <p><strong>Codigo Estudiantil:</strong> <?php echo $codigo_est; ?></p>
    <p><strong>Direccion:</strong> <?php echo $direccion; ?></p>
    <p><strong>Telefono:</strong> <?php echo $telefono; ?></p>
    <p><strong>Genero:</strong> <?php echo $genero; ?></p>
    <p><strong>Semestre:</strong> <?php echo $semestre; ?></p>
    <p><strong>Codigo matricula:</strong> <?php echo $cod_matricula; ?></p>
    <p><strong>Programa academico:</strong> <?php echo $prog_acad; ?></p>
    <p><strong>Estado:</strong> <?php echo $estado; ?></p>

    <h1>Modificar Información Personal</h1>

<form action="modificarinfopersonal.php" method="post">

    

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

    // Obtener información del usuario
    $consulta ="SELECT * FROM semillerista where identificacion=$usuario and contrasena=$contrasena";
    $sql = "SELECT nombres_completos,correo,direccion,telefono,genero,semestre,programa_academico,estado FROM semillerista WHERE identificacion = $usuario"; // Cambia el id o la condición según tus necesidades
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row["nombres_completos"];
        $email = $row["correo"];
        $direccion = $row["direccion"];
        $telefono = $row["telefono"];
        $genero = $row["genero"];
        $semestre = $row["semestre"];
        $prog_acad = $row["programa_academico"];
        $estado = $row["estado"];
    }

    ?>

    <ul class="menu">


    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br><br>

    <label for="email">Email: </label>
    <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br><br>

    <label for="direccion">Dirección: </label>
    <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>"><br><br>

    <label for="telefono">Telefono: </label>
    <input type="int" id="telefono" name="telefono" value="<?php echo $telefono; ?>"><br><br>

    <label for="genero">Genero: </label>
    <input type="text" id="genero" name="genero" value="<?php echo $genero; ?>"><br><br>

    <label for="semestre">Semestre: </label>
    <input type="int" id="semestre" name="semestre" value="<?php echo $semestre; ?>"><br><br>

    <label for="prog_acad">Programa academico: </label>
    <input type="text" id="prog_acad" name="prog_acad" value="<?php echo $prog_acad; ?>"><br><br>

    <label for="estado">Estado: </label>
    <input type="text" id="estado" name="estado" value="<?php echo $estado; ?>"><br><br>

    <ul class="centrado">
    <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Guardar Cambios</button>

    
</form>


    <?php
} else {
    echo "Usuario no encontrado";
}

?>
</body>
</html>
