<?php
    require("conexion.php");
    
    $id_edificio = $_GET['seleccionado'];
    $delete = "DELETE FROM edificio WHERE id_edificio = $id_edificio";
    $resultado = mysqli_query($conexion, $delete);
    header("Location: edificios.php");
?>