<?php
    require("../conexion.php");

    date_default_timezone_set('America/Santiago');

    $rut_recibido= $_POST["rut_acceso"];
    $edificio_recibido= $_POST["edificio_acceso"];

   // $queryedificio = "SELECT id_edificio FROM `edificio` WHERE nombre_edificio = '$edificio_recibido'";
   // $resultadoedificio = mysqli_query($conexion,$queryedificio);
   // while($row=mysqli_fetch_assoc($resultadoedificio)){
   //     $id_edificio = $row['id_edificio'];
   // }


    $sql = "UPDATE `puede` SET `hora_salida` = CURRENT_TIME WHERE `run_personal` = $rut_recibido
    AND `hora_ingreso` < (SELECT CURRENT_TIME)
    AND `fecha_ingreso` = (SELECT CURRENT_DATE)
    AND `id_edificio` = (SELECT id_edificio FROM edificio WHERE nombre_edificio = '$edificio_recibido')
    AND `id_ingreso` = (SELECT MAX(id_ingreso) FROM puede WHERE run_personal = $rut_recibido)";
    $resultado = mysqli_query($conexion,$sql);
    header('Location: totem_salida.php');

?>

