<?php
    require("conexion.php");

    $consulta = "SELECT * FROM edificio";
    $resultado = mysqli_query($conexion, $consulta);
    
    while ($row=mysqli_fetch_assoc($resultado)) {
        $id_edificio = $row["id_edificio"];
        $nombre_edificio = $row["nombre_edificio"];
        $capacidad_maxima_edificio = $row["capacidad_maxima_edificio"];

        echo "<tr>";
        echo "<td>".$id_edificio."</td>";
        echo "<td>".$nombre_edificio."</td>";
        echo "<td>".$capacidad_maxima_edificio."</td>";
        echo "</tr>";
        
    }

?>