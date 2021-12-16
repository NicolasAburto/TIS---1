<?php
    require("conexion.php");

    // cantidad actual
    $queryenvivo = "SELECT run_personal FROM `puede` WHERE fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivo=mysqli_query($conexion,$queryenvivo);
    $numero = mysqli_num_rows($resultadoenvivo);

    // capacidad total edificios
    $queryenvivocaptotal= "SELECT capacidad_maxima_edificio FROM `edificio`";
    $resultadoenvivocaptotal=mysqli_query($conexion,$queryenvivocaptotal);

    $numerocaptotal = 0;
    while($row=mysqli_fetch_assoc($resultadoenvivocaptotal)){
        $numerocaptotal += $row['capacidad_maxima_edificio'];
    }

    // alumno
    $queryenvivoalum = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='alumno' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivoalum=mysqli_query($conexion,$queryenvivoalum);
    $numeroalum = mysqli_num_rows($resultadoenvivoalum);
    
    // docente
    $queryenvivodoc = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Docente' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivodoc=mysqli_query($conexion,$queryenvivodoc);
    $numerodoc = mysqli_num_rows($resultadoenvivodoc);

    // Administrativo
    $queryenvivoadm = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Administrativo' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivoadm=mysqli_query($conexion,$queryenvivoadm);
    $numeroadm = mysqli_num_rows($resultadoenvivoadm);

    // Auxiliar
    $queryenvivoaux = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Auxiliar aseo' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivoaux=mysqli_query($conexion,$queryenvivoaux);
    $numeroaux = mysqli_num_rows($resultadoenvivoaux);

    // Mantención
    $queryenvivoman= "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Mantencion' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivoman=mysqli_query($conexion,$queryenvivoman);
    $numeroman = mysqli_num_rows($resultadoenvivoman);

    // Seguridad
    $queryenvivoseg = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Seguridad' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivoseg=mysqli_query($conexion,$queryenvivoseg);
    $numeroseg = mysqli_num_rows($resultadoenvivoseg);

    //hora
    $queryhora = "SELECT curTime() as consultahora";
    $resultadohora=mysqli_query($conexion,$queryhora);
    
    //fecha
    $queryfecha = "SELECT CURDATE() as consultafecha";
    $resultadofecha=mysqli_query($conexion,$queryfecha);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <style type="text/css">
        h3 { color: black; font-family:  'Ubuntu', sans-serif; }
        h2 { color: black; font-family:  'Ubuntu', sans-serif; }
        h1 { color: black; font-family:  'Ubuntu', sans-serif; }
    </style>

    <title>Reporte</title>
</head>
<body>
<img src="CSS/logoucsc.png" alt="" width="300" height="100">
    <h1>Reporte en vivo - Aforo UCSC Campus San Andrés</h1>
    <br>
    <h2>Día: <?php foreach($resultadofecha as $fecha){
                echo $fecha["consultafecha"];
            }?>
    </h2>

    <tr>
        <td>
            <?php
            $date = date('Y/m/d H:i:s');
            ?>
        </td>
    </tr>

    <h2>Hora: <?php foreach($resultadohora as $hora){
                echo $hora["consultahora"];
            }?>
    </h2>
    <hr>
    <h3>Capacidad Total: <?php echo "$numerocaptotal"?> Personas.</h3>
    <h3>Aforo Actual: <?php echo "$numero"?> Personas.</h3>
    <br>
    <h3>Alumnos: <?php echo "$numeroalum"?> Personas.</h3>
    <h3>Docentes: <?php echo "$numerodoc"?> Personas.</h3>
    <h3>Administrativos: <?php echo "$numeroadm"?> Personas.</h3>
    <h3>Auxiliares: <?php echo "$numeroaux"?> Personas.</h3>
    <h3>Mantención: <?php echo "$numeroman"?> Personas.</h3>
    <h3>Seguridad: <?php echo "$numeroseg"?> Personas.</h3>
    <hr>
    <h3>Reporte generado por la Unidad de Infraestructura DO - UCSC</h3>
    
</body>
</html>



<?php
date_default_timezone_set('America/Santiago');
$date = date('d-m-Y H:i:s');
echo "$date";       