<?php
    require("../conexion.php");

    $run_personal_recibido= $_POST["input_run_personal"];
    $nombre_personal_recibido= $_POST["input_nombre_personal"];
    $cargo_personal_recibido= $_POST["input_cargo_personal"];


    $sentencia2="SELECT * FROM `personal` WHERE run = '$run_personal_recibido'";
    $resultado2=mysqli_query($conexion,$sentencia2);
    $count2 = 0;
    $count3 = 0;
    $count2 = mysqli_num_rows($resultado2); //Numero de filas del resultado de la consulta
    $count3 = mysqli_num_rows($resultado2); //Numero de filas del resultado de la consulta
 
    if($count2 == 0){
        if($count3 == 0){ 
            $sql = "INSERT INTO personal (run, nombre, cargo) VALUES ('$run_personal_recibido', '$nombre_personal_recibido', '$cargo_personal_recibido')";
            $resultado = mysqli_query($conexion,$sql);
            header('Location: index_personal.php?success=1');
        }
    }else{
        header('Location: index_personal.php?error=1');
    }
 
?>