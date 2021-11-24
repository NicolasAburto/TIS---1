<?php
    require("conexion.php");

    $run_personal_recibido=$_GET["seleccionado"];
    $sql = "DELETE FROM personal WHERE run=$run_personal_recibido";
    $resultado = mysqli_query($conexion,$sql);
    header('Location: index_personal.php');
?>