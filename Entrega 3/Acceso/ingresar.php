<?php
    require("../conexion.php");

    date_default_timezone_set('America/Santiago');

    $rut_recibido= $_POST["rut_acceso"];
    $edificio_recibido= $_POST["edificio_acceso"];

    $queryedificio = "SELECT id_edificio FROM `edificio` WHERE nombre_edificio = '$edificio_recibido'";
    $resultadoedificio = mysqli_query($conexion,$queryedificio);
    while($row=mysqli_fetch_assoc($resultadoedificio)){
    $id_edificio_rec = $row['id_edificio'];
    }

    $sql = "INSERT INTO puede (run_personal, id_edificio, fecha_ingreso, hora_ingreso, hora_salida) VALUES ('$rut_recibido','$id_edificio_rec', now(), now(),'23:59:59') ";
    $resultado = mysqli_query($conexion,$sql);
    header('Location: totem_entrada.php');


?>