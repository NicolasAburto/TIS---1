<?php
    require("conexion.php");
    $nombre_edificio_sel = $_GET["input_nombre_edificio"];
    
    $sql = "SELECT edificio FROM edificio WHERE nombre_edificio = $nombre_edificio_sel";
    $resultado = mysqli_query($conexion, $sql);
    echo 'Personas actualmente en el campus: ' . $nombre_edificio_sel;
    header('Location: datosanteriores.php');
?>