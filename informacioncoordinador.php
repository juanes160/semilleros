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
	        max-width: 2000px;
	        margin: auto;
            }

   
        .centrado {
            text-align: center;
            font-weight: bold; /* Agregamos negrita */
            font-size: 30px; /* Tamaño de fuente más grande */

            }
        
        .tabla-centrada {
             margin: 0 auto; /* Margen automático en los lados, centra horizontalmente */
            }
        </style>

       </head>
       <body>
        <ul class="menu">
        <p class="centrado">BIENVENIDO COORDINADOR</p>
        <div>
            <h1>Información del coordinador</h1>


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

$consulta ="SELECT * FROM coordinador where identificacion=$usuario and contrasena=$contrasena";

$sql = "SELECT nombres_completos,identificacion,direccion,telefono,correo_electronico,genero,fecha_de_nacimiento,programa_academico,area_conocimiento,fecha_de_vinculacion FROM coordinador WHERE identificacion = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombreUsuario = $row['nombres_completos'];
    $idUsuario = $row['identificacion'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $emailUsuario = $row['correo_electronico'];
    $genero = $row['genero'];
    $fecha_naci = $row['fecha_de_nacimiento'];
    $prog_acad = $row['programa_academico'];
    $area = $row['area_conocimiento'];
    $fecha_vincu = $row['fecha_de_vinculacion'];
}
?>

    <p><strong>Nombre:</strong> <?php echo $nombreUsuario; ?></p>
    <p><strong>Email:</strong> <?php echo $emailUsuario; ?></p>
    <p><strong>Identificacion:</strong> <?php echo $idUsuario; ?></p>
    <p><strong>Fecha de nacimiento:</strong> <?php echo $fecha_naci; ?></p>
    <p><strong>direccion:</strong> <?php echo $direccion; ?></p>
    <p><strong>telefono:</strong> <?php echo $telefono; ?></p>
    <p><strong>genero:</strong> <?php echo $genero; ?></p>
    <p><strong>Areas de conocimiento</strong> <?php echo $area; ?></p>
    <p><strong>Fecha de vinculacion:</strong> <?php echo $fecha_vincu; ?></p>
    <p><strong>programa academico:</strong> <?php echo $prog_acad; ?></p>
    <?php


$conn->close();

?>



<h1>Modificar Información Personal</h1>

<form action="modificarinfocoor.php" method="post">

    

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
    $consulta ="SELECT * FROM coordinador where identificacion=$usuario and contrasena=$contrasena";
    $sql = "SELECT nombres_completos,direccion,telefono,correo_electronico,genero,programa_academico,area_conocimiento FROM coordinador WHERE identificacion = $usuario"; // Cambia el id o la condición según tus necesidades
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row["nombres_completos"];
        $direccionusu = $row["direccion"];
        $telefonousu = $row["telefono"];
        $emailusu = $row["correo_electronico"];
        $generousu = $row["genero"];
        $prog_acadusu = $row["programa_academico"];
        $area_cousu = $row["area_conocimiento"];


    ?>

    <ul class="menu">


    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br><br>

    <label for="email">Email: </label>
    <input type="text" id="email" name="email" value="<?php echo $emailusu; ?>"><br><br>

    <label for="direccion">Dirección: </label>
    <input type="text" id="direccion" name="direccion" value="<?php echo $direccionusu; ?>"><br><br>

    <label for="telefono">Telefono: </label>
    <input type="int" id="telefono" name="telefono" value="<?php echo $telefonousu; ?>"><br><br>

    <label for="genero">Genero: </label>
    <input type="text" id="genero" name="genero" value="<?php echo $generousu; ?>"><br><br>

    <label for="prog_acad">Programa academico: </label>
    <input type="text" id="prog_acad" name="prog_acad" value="<?php echo $prog_acadusu; ?>"><br><br>

    <label for="area_co">Area de conocimiento: </label>
    <input type="text" id="area_co" name="area_co" value="<?php echo $area_cousu; ?>"><br><br>


    <ul class="centrado">
    <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Guardar Cambios</button>

    
</form>


    <?php
} else {
    echo "Usuario no encontrado";
}

?>


<h1>Lista de semilleristas</h1>
            <?php

$conexion=mysqli_connect('localhost', 'root', '', 'semillerosudenar');

?>


<!DOCTYPE html>
<html>
<body>

<br>

   <table border="10" align="left">

        <tr> 
         <td>Identificacion</td>
         <td>Nombre</td>
         <td>Correo</td>
         <td>Direccion</td>
         <td>Telefono</td>

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

<h1>Semillero</h1>

<!DOCTYPE html>
<html>
<body>

<br>

   <table class="tabla-centrada" border="10">

        <tr> 
         <td>Email</td>
         <td>Nombre</td>
         <td>Descripcion</td>
         <td>Mision</td>
         <td>Vision</td>

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

  <p> <a class="link" href="registrosemillero.html"> Registrar semillero</a></p>



  <h1>Modificar Información semillero</h1>

<form action="modificarinfosemi.php" method="post">

    

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
    $consulta ="SELECT * FROM semillero ";
    $sql = "SELECT nombres_completos,correo_electronico,descripcion,mision,vision FROM semillero "; // Cambia el id o la condición según tus necesidades
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row["nombres_completos"];
        $email = $row["correo_electronico"];
        $descripcion = $row["descripcion"];
        $mision = $row["mision"];
        $vision = $row["vision"];   

    ?>

    <ul class="menu">


    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br><br>

    <label for="email">Email: </label>
    <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br><br>

    <label for="descripcion">Descripción: </label>
    <input type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>"><br><br>

    <label for="mision">Mision: </label>
    <input type="text" id="mision" name="mision" value="<?php echo $mision; ?>"><br><br>

    <label for="vision">Vision: </label>
    <input type="text" id="vision" name="vision" value="<?php echo $vision; ?>"><br><br>

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

<h1>Evento</h1>

<!DOCTYPE html>
<html>

<body>

<br>

   <table class="tabla-centrada" border="10">

        <tr> 
         <td>Codigo</td>
         <td>Nombre</td>
         <td>Descripcion</td>
         <td>Lugar</td>
         <td>Clasificacion</td>
         <td>Fecha inicio</td>
         <td>Fecha fin</td>

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

  <p><a class="link" href="eventos.html"> Registrar evento</a></p>

  <h1>Modificar Información evento</h1>

<form action="modicarinfoeven.php" method="post">

    

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
    $consulta ="SELECT * FROM eventos";
    $sql = "SELECT nombre,descripcion,lugar,clasificacion,fecha_inicio,fecha_fin FROM eventos"; // Cambia el id o la condición según tus necesidades
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row["nombre"];
        $descripcion = $row["descripcion"];
        $lugar = $row["lugar"];
        $clasificacion = $row["clasificacion"];
        $fecha_inicio = $row["fecha_inicio"];
        $fecha_fin = $row["fecha_fin"];

    

    ?>

    <ul class="menu">


    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br><br>

    <label for="descripcion">Descripcion: </label>
    <input type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>"><br><br>

    <label for="lugar">Lugar: </label>
    <input type="text" id="lugar" name="lugar" value="<?php echo $lugar; ?>"><br><br>

    <label for="clasificacion">Clasificacion: </label>
    <input type="text" id="clasificacion" name="clasificacion" value="<?php echo $clasificacion; ?>"><br><br>

    <label for="fecha_inicio">Fecha de inicio: </label>
    <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>"><br><br>

    <label for="fecha_fin">Fecha fin: </label>
    <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $fecha_fin; ?>"><br><br>

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

 </html>

 </body>

<h1>PROYECTOS</h1>

<!DOCTYPE html>
<html>

<body>

<br>

   <table class="tabla-centrado" border="10">

        <tr> 
         <td>Codigo</td>
         <td>Titulo</td>
         <td>Integrantes</td>
         <td>Tipo de proyecto</td>
         <td>Estado</td>
         <td>Fecha inicio</td>
         <td>Fecha final</td>
         <td>Propuesta</td>

        </tr>

        <?php
        $sql="SELECT * from proyecto";
        $result=mysqli_query($conexion,$sql);
        
        while($mostrar=mysqli_fetch_array($result)){
         ?>

        <tr>
            <td><?php echo $mostrar['codigo'] ?></td>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['integrantes'] ?></td>
            <td><?php echo $mostrar['tipoproyecto'] ?></td>
            <td><?php echo $mostrar['estado'] ?></td>
            <td><?php echo $mostrar['fechainicio'] ?></td>
            <td><?php echo $mostrar['fechafinalizacion'] ?></td>
            <td><?php echo $mostrar['propuesta'] ?></td>

        </tr>
    <?php 
    }
    ?>   
  </table> 
  </body>

  <p> <a class="link" href="proyecto.html">Registrar Proyecto</a></p>
  <div>
  <p><strong>---------------------------------------------------------------------------------------------------</strong><p>
  <div>
  <p><strong>BEOWULF SOFTWARE</strong><p>
  <div>

</body>

</html>

</ul>
<body>


</body>
</html>
