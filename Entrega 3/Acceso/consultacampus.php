<?php
require("../conexion.php");

$queryenvivocaptotal= "SELECT capacidad_maxima_edificio FROM `edificio`";
$resultadoenvivocaptotal=mysqli_query($conexion,$queryenvivocaptotal);
$numerocaptotal = 0;
while($row=mysqli_fetch_assoc($resultadoenvivocaptotal)){
    $numerocaptotal += $row['capacidad_maxima_edificio'];
}


$queryenvivo = "SELECT run_personal FROM `puede` WHERE fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
$resultadoenvivo=mysqli_query($conexion,$queryenvivo);
$numero = mysqli_num_rows($resultadoenvivo);
echo 'Personas actualmente en el Campus: ' . $numero;

$porcentajetotal = (($numero*100)/($numerocaptotal));
echo '<br>';
echo 'Equivalente al ' . round($porcentajetotal,1);
echo '% de la Capacidad Máxima del Campus';



?>
