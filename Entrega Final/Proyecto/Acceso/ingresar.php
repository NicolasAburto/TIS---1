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

    //$sql = "INSERT INTO puede (run_personal, id_edificio, fecha_ingreso, hora_ingreso, hora_salida) VALUES ('$rut_recibido','$id_edificio_rec', now(), now(),'23:59:59') ";
    //$resultado = mysqli_query($conexion,$sql);
    //header('Location: totem_entrada.php');
	


        //Buscar usuario en BD
		$sentencia1="SELECT * FROM `personal` WHERE run = '$rut_recibido'";
		$resultado1=$conexion->query($sentencia1) or die ("Error al comprobar usuario: ".mysqli_error($conexion));
		$count = mysqli_num_rows($resultado1); //Numero de filas del resultado de la consulta


        //Buscar si usuario ya está en algún edificio
        $sentencia2="SELECT * FROM `puede` WHERE `run_personal` = '$rut_recibido' AND `fecha_ingreso` = (SELECT CURRENT_DATE) AND `hora_ingreso` < (SELECT CURRENT_TIME) AND `hora_salida` > (SELECT CURRENT_TIME)";
        $resultado2=mysqli_query($conexion,$sentencia2);
        $count2 = mysqli_num_rows($resultado2); //Numero de filas del resultado de la consulta

		if($count > 0) //si se encuentra al usuario registrado en el personal
		{
            if($count2 == 0){ //verificar si el usuario ingresado no está en un edificio
                
                $sql = "INSERT INTO puede (run_personal, id_edificio, fecha_ingreso, hora_ingreso, hora_salida) VALUES ('$rut_recibido','$id_edificio_rec', now(), now(),'23:59:59') ";
                $resultado = mysqli_query($conexion,$sql);
                header('Location: totem_entrada.php?success=1');
            }
            else{ //el usuario ingresado ya está al interior de un edificio
                header('Location: totem_entrada.php?error=2');
            }

		}
		else //el usuario no existe en la BD personal
		{
			header('Location: totem_entrada.php?error=1');
		}

?>
