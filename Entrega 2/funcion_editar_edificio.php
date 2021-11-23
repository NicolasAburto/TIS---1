<?php
    require("conexion.php");

    $id_edificio = $row["input_"];
    $nombre_edificio = $row["input_"];
    $capacidad_maxima_edificio = $row["input_"];
    
    $sql = "UPDATE edificio SET id_edificio= '$id_edificio', nombre_edificio= '$nombre_edificio', capacidad_maxima_edificio='$capacidad_maxima_edificio'";

?>