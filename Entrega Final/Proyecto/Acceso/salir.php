<?php
    require("../conexion.php");

    date_default_timezone_set('America/Santiago');

    $rut_recibido= $_POST["rut_acceso"];
    $edificio_recibido= $_POST["edificio_acceso"];

   //Buscar usuario en BD
	$sentencia1="SELECT * FROM `personal` WHERE run = '$rut_recibido'";
	$resultado1=$conexion->query($sentencia1) or die ("Error al comprobar usuario: ".mysqli_error($conexion));
	$count = mysqli_num_rows($resultado1); //Numero de filas del resultado de la consulta

    //Buscar si usuario ya está en algún edificio
    $sentencia2="SELECT * FROM `puede` WHERE `run_personal` = '$rut_recibido' AND `fecha_ingreso` = (SELECT CURRENT_DATE) AND `hora_ingreso` < (SELECT CURRENT_TIME) AND `hora_salida` > (SELECT CURRENT_TIME)";
    $resultado2=mysqli_query($conexion,$sentencia2);
    $count2 = mysqli_num_rows($resultado2); //Numero de filas del resultado de la consulta

    //Buscar si usuario está en edificio seleccionado
    $sentencia3="SELECT * FROM `puede` WHERE `run_personal` = '$rut_recibido' AND `fecha_ingreso` = (SELECT CURRENT_DATE) AND `hora_ingreso` < (SELECT CURRENT_TIME) AND `hora_salida` > (SELECT CURRENT_TIME) AND `id_edificio` = (SELECT id_edificio FROM edificio WHERE nombre_edificio = '$edificio_recibido')";
    $resultado3=mysqli_query($conexion,$sentencia3);
    $count3 = mysqli_num_rows($resultado3); //Numero de filas del resultado de la consulta

   if($count > 0){ //verificar el usuario registrado en el personal
        if($count2 > 0){ //verificar si el usuario ingresado está en un edificio
            if($count3 == 1){ //verificar si el usuario está en el edificio del cual se quiere salir
                $sql = "UPDATE `puede` SET `hora_salida` = CURRENT_TIME WHERE `run_personal` = $rut_recibido
                AND `hora_ingreso` < (SELECT CURRENT_TIME)
                AND `fecha_ingreso` = (SELECT CURRENT_DATE)
                AND `id_edificio` = (SELECT id_edificio FROM edificio WHERE nombre_edificio = '$edificio_recibido')
                AND `id_ingreso` = (SELECT MAX(id_ingreso) FROM puede WHERE run_personal = $rut_recibido)";
                $resultado = mysqli_query($conexion,$sql);
                header('Location: totem_salida.php?success=1');

            }
            else{ //usuario no está en el edificio seleccionado
                header('Location: totem_salida.php?error=3');
                
            }
            
        }else{ //usuario no esta dentro de un edificio
            header('Location: totem_salida.php?error=2');
        }
   }
   else //no se encuentra el usuario en la BD
   {
    header('Location: totem_salida.php?error=1');
   }
?>

//header('Location: totem_salida.php');