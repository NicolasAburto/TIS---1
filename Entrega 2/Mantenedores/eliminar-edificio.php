<?php
    require("../conexion.php");
    $id_edificio = $_POST['id_edificio'];
    $delete = "DELETE FROM edificio WHERE id_edificio = '$id_edificio'";
    $resultado = mysqli_query($conexion, $delete);
    header("Location: edificios.php");
?>
