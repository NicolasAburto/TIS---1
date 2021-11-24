<?php
    require("conexion.php")

    $usuario = $_POST['user'];

    $consulta = "SELECT * FROM personal WHERE run='.$usuario.'";
    $resultado = mysqli_query($conexion,$consulta);

    while($row=mysqli_fetch_assoc($resultado)){
        $rol = $row['cargo'];
        if($rol = "Administrativo"){
            header('Location: portal.php');
        }else{
            echo 'El run no es administrador';
        }
    }
?>
