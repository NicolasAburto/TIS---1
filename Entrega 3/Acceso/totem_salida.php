<?php
    $conexion = mysqli_connect("localhost","root","","aforoucsc");

    //Fecha actual
    date_default_timezone_set('America/Santiago');
    $fecha_actual = date('d-m-Y');

    // cantidad actual
    $queryenvivo = "SELECT run_personal FROM `puede` WHERE fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivo=mysqli_query($conexion,$queryenvivo);
    $numero = mysqli_num_rows($resultadoenvivo);

    // capacidad total edificios
    $queryenvivocaptotal= "SELECT capacidad_maxima_edificio FROM `edificio`";
    $resultadoenvivocaptotal=mysqli_query($conexion,$queryenvivocaptotal);
    $numerocaptotal = 0;
    while($row=mysqli_fetch_assoc($resultadoenvivocaptotal)){
        $numerocaptotal += $row['capacidad_maxima_edificio'];
    }

    // cantidad actual educacion
    $queryeduca = "SELECT * FROM `puede` WHERE fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida AND id_edificio = 2";
    $resactualeduca=mysqli_query($conexion,$queryeduca);
    $actualeduca = mysqli_num_rows($resactualeduca);
    // cantidad total edificio educacion
    $querytotaleduca = "SELECT capacidad_maxima_edificio FROM `edificio` WHERE id_edificio = 2";
    $restotalaleduca=mysqli_query($conexion,$querytotaleduca);
    $totaleduca = 0;
    while($row=mysqli_fetch_assoc($restotalaleduca)){
        $totaleduca += $row['capacidad_maxima_edificio'];
    }

    // cantidad actual periodismo
    $queryperiodismo = "SELECT * FROM `puede` WHERE fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida AND id_edificio = 3";
    $resactualperiodismo=mysqli_query($conexion,$queryperiodismo);
    $actualperiodismmo = mysqli_num_rows($resactualperiodismo);
    // cantidad total edificio pediodismo
    $querytotalperiodismo = "SELECT capacidad_maxima_edificio FROM `edificio` WHERE id_edificio = 3";
    $restotalalperiodismo=mysqli_query($conexion,$querytotalperiodismo);
    $totalperiodismo = 0;
    while($row=mysqli_fetch_assoc($restotalalperiodismo)){
        $totalperiodismo += $row['capacidad_maxima_edificio'];
    }

    $porcentajetotal = round(($numero*100)/($numerocaptotal),0);
    $porcentajeeduca = round(($actualeduca*100)/($totaleduca),0);
    $porcentajeperiodismo = round(($actualperiodismmo*100)/($totalperiodismo),0);

?>

<!doctype html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript" src="funcionbotones.js"></script>
    <script type="text/javascript" src="reloj.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript">

		function tiempoReal()
		{
			var tabla = $.ajax({
				url:'consultacampus.php',
				dataType:'text',
				async:false
			}).responseText;

			document.getElementById("campus").innerHTML = tabla;
		}
		setInterval(tiempoReal, 1000);


        function tiempoReal2()
		{
			var tabla = $.ajax({
				url:'consultacampus2.php',
				dataType:'text',
				async:false
			}).responseText;

			document.getElementById("campus2").innerHTML = tabla;
		}
		setInterval(tiempoReal2, 1000);
		</script>

    <link rel="stylesheet" href="estilosalida.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"> 

    <style>
        body{
            font-family: 'Ubuntu', sans-serif;
        }
    </style>

    <title>Totem de Salida - Acceso Edificios UCSC Campus San Andrés</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://www.ucsc.cl/wp-content/uploads/2015/01/logo_horizontal_color_sinfondo.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                <b class="ms-3">Totem de Salida</b> - Acceso Edificios UCSC Campus San Andrés.
            </a>
        </div>
    </nav>

    <div class="container-fluid fondoportal">
        <div class="row capacontainer">
            <div class="col-lg-6">
                <div class="datos">
                <form name="fo" action="salir.php" method="POST">
                    <h5>Ingrese su rut:</h5>

                    <table class="botonera">
                        <tr>
                            <td colspan="3">
                                <input type="text" name="rut_acceso" id="valores" placeholder="123456789" onkeypress="return solonumeros(event)">
                            </td>
                        </tr>

                        <tr>
                            <td><input type="button" value="1" onClick="retornar(value)"></td>
                            <td><input type="button" value="2" onClick="retornar(value)"></td>
                            <td><input type="button" value="3" onClick="retornar(value)"></td>
                        </tr>

                        <tr>
                            <td><input type="button" value="4" onClick="retornar(value)"></td>
                            <td><input type="button" value="5" onClick="retornar(value)"></td>
                            <td><input type="button" value="6" onClick="retornar(value)"></td>
                        </tr>
                        <tr>
                            <td><input type="button" value="7" onClick="retornar(value)"></td>
                            <td><input type="button" value="8" onClick="retornar(value)"></td>
                            <td><input type="button" value="9" onClick="retornar(value)"></td>
                        </tr>
                        <tr>
                            <td><input type="button" value="C" onclick="eliminar_todo()"></td>
                            <td><input type="button" value="0" onClick="retornar(value)"></td>
                            <td><input type="button" value="←" onclick="eliminar()"></td>
                        </tr>
                    </table>

                    <h5 class="mt-5">Seleccione edificio a Abandonar:</h5>
                    <select name="edificio_acceso" class="edificios_datosant mb-2" required>
                        <option></option>
                        <?php
                            $sql= "SELECT * FROM edificio";
                            $resultado=mysqli_query($conexion,$sql);

                            while($row=mysqli_fetch_assoc($resultado)){
                                $nombre_edificio_recibido = $row['nombre_edificio'];
                        ?>
                        <option><?php echo "$nombre_edificio_recibido"?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <input class="btn btn-danger mt-3 mb-3" type="submit" value="Abandonar Edificio">
                </form>
                </div>
                            
            </div>
            <div class="col-lg-6">
                <div class="estadistica">
                <h3>Edificios Campus San Andrés Actualmente:</h3>
                <h5>Hora:</h4>
                <div id="reloj" class="reloj">00 : 00 : 00</div>
                <br>
                <h5>Día:</h5>
                <?php
                    echo $fecha_actual;
                ?>
                <h5><section class="mt-3 mb-3" id="campus">
                </section></h5>

                <section id="campus2">
                </section>
                </div>
            </div>
            
            <hr class="mt-5">
            
            <div class="col-lg-12">
                <footer class="footeringreso">
                    <p class="textofooteringreso">Unidad de Infraestructura DO - UCSC. Todos los derechos reservados 2021
                        <span class="material-icons copyenvivo">
                            copyright
                        </span>
                    </p>
                </footer>
            </div>


        </div>
    </div>

    
    <script>setTimeout('document.location.reload()',900000); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>