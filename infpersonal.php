<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo1.css">

        <style>
        .menu{
	        list-style: none;
	        padding: 0;
	        background: #798081;
	        width: 90%;
	        max-width: 1000px;
	        margin: auto;
            }
        
        </style>

       </head>
       <body>
        <ul class="menu">
            <li><a href = "#">Información Personal y perfil(consultar)</a></li>


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
<h1>Información del Usuario</h1>
    <p><strong>Nombre:</strong> <?php echo $nombreUsuario; ?></p>
    <p><strong>Email:</strong> <?php echo $emailUsuario; ?></p>
    <p><strong>idUsuario:</strong> <?php echo $idUsuario; ?></p>
    <p><strong>codigo Estudiantil:</strong> <?php echo $codigo_est; ?></p>
    <p><strong>direccion:</strong> <?php echo $direccion; ?></p>
    <p><strong>telefono:</strong> <?php echo $telefono; ?></p>
    <p><strong>genero:</strong> <?php echo $genero; ?></p>
    <p><strong>semestre:</strong> <?php echo $semestre; ?></p>
    <p><strong>codigo matricula:</strong> <?php echo $cod_matricula; ?></p>
    <p><strong>programa academico:</strong> <?php echo $prog_acad; ?></p>
    <p><strong>estado:</strong> <?php echo $estado; ?></p>
    <?php
} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>

            <li><a href = "#">Lista de semilleristas</a></li>
            <?php

$conexion=mysqli_connect('localhost', 'root', '', 'semillerosudenar');

?>


<!DOCTYPE html>
<html>
<head>
    <title>mostrar informacion</title>
</head>
<body>

<br>

   <table border="1">

        <tr> 
         <td>identificacion</td>
         <td>nombre</td>
         <td>correo</td>
         <td>direccion</td>
         <td>telefono</td>

        </tr>

        <?php
        $sql="SELECT * from semillerista";
        $result=mysqli_query($conexion,$sql);
        
        while($mostrar=mysqli_fetch_array($result)){
         ?>
        
        

        <tr>
            <td><?php echo $mostrar['identificacion'] ?></td>
            <td><?php echo $mostrar['nombres_completos'] ?></td>
            <td><?php echo $mostrar['correo'] ?></td>
            <td><?php echo $mostrar['direccion'] ?></td>
            <td><?php echo $mostrar['telefono'] ?></td>
            
        </tr>
    <?php 
    }
    ?>   
  </table> 

</body>

</html>
            <li><a href = "#">Visualizar semillero(consultar)</a></li>

<!DOCTYPE html>
<html>
<head>
    <title>mostrar informacion</title>
</head>
<body>

<br>

   <table border="1">

        <tr> 
         <td>identificacion</td>
         <td>nombre</td>
         <td>correo</td>
         <td>direccion</td>
         <td>telefono</td>

        </tr>

        <?php
        $sql="SELECT * from semillero";
        $result=mysqli_query($conexion,$sql);
        
        while($mostrar=mysqli_fetch_array($result)){
         ?>
        
        

        <tr>
            <td><?php echo $mostrar['correo_electronico'] ?></td>
            <td><?php echo $mostrar['nombres_completos'] ?></td>
            <td><?php echo $mostrar['descripcion'] ?></td>
            <td><?php echo $mostrar['mision'] ?></td>
            <td><?php echo $mostrar['vision'] ?></td>
            
        </tr>
    <?php 
    }
    ?>   
  </table> 

</body>

</html>

            <li><a href = "#">Visualizar evento(consultar)</a></li>

<!DOCTYPE html>
<html>
<head>
    <title>mostrar informacion</title>
</head>
<body>

<br>

   <table border="1">

        <tr> 
         <td>codigo</td>
         <td>nombre</td>
         <td>descripcion</td>
         <td>lugar</td>
         <td>clasificacion</td>
         <td>fecha inicio</td>
         <td>fecha fin</td>

        </tr>

        <?php
        $sql="SELECT * from eventos";
        $result=mysqli_query($conexion,$sql);
        
        while($mostrar=mysqli_fetch_array($result)){
         ?>

        <tr>
            <td><?php echo $mostrar['codigo'] ?></td>
            <td><?php echo $mostrar['nombre'] ?></td>
            <td><?php echo $mostrar['descripcion'] ?></td>
            <td><?php echo $mostrar['lugar'] ?></td>
            <td><?php echo $mostrar['clasificacion'] ?></td>
            <td><?php echo $mostrar['fecha_inicio'] ?></td>
            <td><?php echo $mostrar['fecha_fin'] ?></td>

        </tr>
    <?php 
    }
    ?>   
  </table> 

</body>

</html>

            <li><a href = "#">Acerca de</a></li>
            <li><a href = "#">Contactos</a></li>
        </ul>
    <title>Información del Usuario</title>
</head>
<body>


</body>
</html>
