<?php
    $conexion = mysqli_connect("localhost","root","","aforoucsc2");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Acceso a Edificios UCSC</title>
</head>
<body>
    <h1>Ingreso a un edificio UCSC</h1>


    <form action="ingresar.php" method="POST">
        <h3>Ingrese su rut:</h3>
        <input type="text" name="rut_acceso" placeholder="123456789">
        <h3>Seleccione edificio a Acceder:</h3>
        <input type="text" name="edificio_acceso" placeholder="ID Edificio">
        <h3>Ingrese fecha de Acceso:</h3>
        <input type="date" name="fecha_acceso">
        <h3>Ingrese hora de ingreso al edificio:</h3>
        <input type="time" name="hora_ingreso">
        <h3>Ingrese hora de abandono del edificio:</h3>
        <input type="time" name="hora_salida">
        <br>
        <input type="submit" value="Ingresar">
    </form>
    
    <hr>
    <h3>Listado Edificios UCSC</h3>

    <?php
        $consulta="SELECT * FROM edificio";
        $resultado=mysqli_query($conexion,$consulta);

        while($row=mysqli_fetch_assoc($resultado)){
            $id_recibido = $row["id_edificio"];
            $nombre_recibido = $row["nombre_edificio"];
            $capmax_recibido = $row["capacidad_maxima_edificio"];
            echo "<p>".$id_recibido." ".$nombre_recibido." ".$capmax_recibido."</p>";
        }
    ?>


</body>
</html>