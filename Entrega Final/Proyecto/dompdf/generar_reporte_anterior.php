<?php

require("../conexion.php");

// Nombre edificio
$input_nombre_edificio = $_GET["input_nombre_edificio"];

// Fecha
$dia = $_GET['dia_elegido'];
$semana = $_GET['semana_elegido'];
$mes = $_GET['mes_elegido'];

$semana_mysql = str_replace("-W","",$semana);
$mes_mysql = str_replace("-","",$mes);

// Capacidad total edificio
$query_capedificio= "SELECT capacidad_maxima_edificio FROM `edificio` WHERE nombre_edificio = '$input_nombre_edificio'";
$resultado_capedificio=mysqli_query($conexion,$query_capedificio);

$numero_capedificio = 0;
while($row=mysqli_fetch_assoc($resultado_capedificio)){
    $numero_capedificio = $row['capacidad_maxima_edificio'];
}

// Aforo máximo dia
$query_aforomaxdia= "SELECT NULLIF(COUNT(*),0) AS Dia FROM `edificio`,`puede` WHERE nombre_edificio = '$input_nombre_edificio' AND edificio.id_edificio = puede.id_edificio 
                  AND fecha_ingreso = '$dia'";
$resultado_aforomaxdia=mysqli_query($conexion,$query_aforomaxdia);

$numero_aforomaxdia = 0;
while($row=mysqli_fetch_assoc($resultado_aforomaxdia)){
    $numero_aforomaxdia = $row['Dia'];
}

// Aforo máximo semana
$query_aforomaxsemana= "SELECT NULLIF(COUNT(*),0) AS Semana FROM `edificio`,`puede` WHERE nombre_edificio = '$input_nombre_edificio' AND edificio.id_edificio = puede.id_edificio 
                  AND YEARWEEK(fecha_ingreso) = '$semana_mysql'";
$resultado_aforomaxsemana=mysqli_query($conexion,$query_aforomaxsemana);

$numero_aforomaxsemana = 0;
while($row=mysqli_fetch_assoc($resultado_aforomaxsemana)){
    $numero_aforomaxsemana = $row['Semana'];
}

// Aforo máximo mes
$query_aforomaxmes= "SELECT NULLIF(COUNT(*),0) AS Mes FROM `edificio`,`puede` WHERE nombre_edificio = '$input_nombre_edificio' AND edificio.id_edificio = puede.id_edificio 
                  AND EXTRACT(YEAR_MONTH FROM fecha_ingreso) = '$mes_mysql'";
$resultado_aforomaxmes=mysqli_query($conexion,$query_aforomaxmes);

$numero_aforomaxmes = 0;
while($row=mysqli_fetch_assoc($resultado_aforomaxmes)){
    $numero_aforomaxmes = $row['Mes'];
}

// Tiempo aforo maximo dia
$query_tiempoaforomaxdia = "SELECT TRUNCATE(SUM(TIME_TO_SEC(hora_salida) - TIME_TO_SEC(hora_ingreso))/60,0) as Tiempo_aforo_max_dia FROM `edificio`,`puede` WHERE edificio.nombre_edificio = '$input_nombre_edificio' 
                         AND edificio.id_edificio = puede.id_edificio AND fecha_ingreso = '$dia'";
$resultado_tiempoaforomaxdia=mysqli_query($conexion,$query_tiempoaforomaxdia);

$numero_tiempoaforomaxdia = 0;
while($row=mysqli_fetch_assoc($resultado_tiempoaforomaxdia)){
    $numero_tiempoaforomaxdia = $row['Tiempo_aforo_max_dia'];
}

// Tiempo aforo maximo semana
$query_tiempoaforomaxsemana = "SELECT TRUNCATE(SUM(TIME_TO_SEC(hora_salida) - TIME_TO_SEC(hora_ingreso))/60,0) as Tiempo_aforo_max_semana FROM `edificio`,`puede` WHERE edificio.nombre_edificio = '$input_nombre_edificio' 
                         AND edificio.id_edificio = puede.id_edificio AND YEARWEEK(fecha_ingreso) = '$semana_mysql'";
$resultado_tiempoaforomaxsemana=mysqli_query($conexion,$query_tiempoaforomaxsemana);

$numero_tiempoaforomaxsemana = 0;
while($row=mysqli_fetch_assoc($resultado_tiempoaforomaxsemana)){
    $numero_tiempoaforomaxsemana = $row['Tiempo_aforo_max_semana'];
}

// Tiempo aforo maximo mes
$query_tiempoaforomaxmes = "SELECT TRUNCATE(SUM(TIME_TO_SEC(hora_salida) - TIME_TO_SEC(hora_ingreso))/60,0) as Tiempo_aforo_max_mes FROM `edificio`,`puede` WHERE edificio.nombre_edificio = '$input_nombre_edificio' 
AND edificio.id_edificio = puede.id_edificio AND EXTRACT(YEAR_MONTH FROM fecha_ingreso) = '$mes_mysql'";
$resultado_tiempoaforomaxmes=mysqli_query($conexion,$query_tiempoaforomaxmes);

$numero_tiempoaforomaxmes = 0;
while($row=mysqli_fetch_assoc($resultado_tiempoaforomaxmes)){
    $numero_tiempoaforomaxmes = $row['Tiempo_aforo_max_mes'];
}


date_default_timezone_set('America/Santiago');
$fecha = date('d-m-Y');
$hora = date('H:i:s');

require_once 'autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

//ob_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body{
            font-family: Helvetica;
        }
    </style>

    <title>Reporte</title>
</head>
<body>
    <img src="logoucsc.jpg" alt="" width="150" height="50">
    <h1 style="text-align:center;">Reporte Datos Anteriores - Aforo UCSC Campus San Andrés</h1>
    <br>
    <h2>Día: <?php echo "$fecha";?></h2>
    <h2>Hora: <?php echo "$hora";?></h2>
    <hr>
    <h3>Nombre Edificio: <?php echo "$input_nombre_edificio"?></h3>
    <h3>Capacidad Edificio: <?php echo "$numero_capedificio"?></h3>
    <h3>Aforo Máximo: <?php echo "$numero_aforomaxdia"?><?php echo "$numero_aforomaxsemana"?><?php echo "$numero_aforomaxmes"?> Personas.</h3>
    <h3>Tiempo Aforo Máximo: <?php echo "$numero_tiempoaforomaxdia"?><?php echo "$numero_tiempoaforomaxsemana"?><?php echo "$numero_tiempoaforomaxmes"?> Minutos.</h3>
    <h3>Fecha: <?php echo "$dia"?><?php echo "$semana"?><?php echo "$mes"?></h3>
    <hr>
    <h3>Reporte generado por la Unidad de Infraestructura DO - UCSC</h3>
    
</body>
</html>

<?php

$dompdf = new Dompdf($options);
$dompdf->loadHtml(ob_get_clean());
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$pdf = $dompdf->output();
$filename = 'reporte.pdf';
$dompdf->stream();

//$dompdf->stream($filename, array("Attachment" => 0));
?>