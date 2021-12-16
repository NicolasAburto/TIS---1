<?php
    require("conexion.php");
    error_reporting(0);

    // Nombre edificio
    $input_nombre_edificio = $_GET["input_nombre_edificio"];

    // Fecha
    $dia = $_GET['dia_elegido'];
    $semana = $_GET['semana_elegido'];
    $mes = $_GET['mes_elegido'];

    $semana_mysql = str_replace("-W","",$semana);
    $mes_mysql = str_replace("-","",$mes);

    // Capacidad total edificio
    $query_capedificio= "SELECT capacidad_maxima_edificio FROM `edificio` WHERE nombre_edificio = '$input_nombre_edificio'";
    $resultado_capedificio=mysqli_query($conexion,$query_capedificio);

    $numero_capedificio = 0;
    while($row=mysqli_fetch_assoc($resultado_capedificio)){
        $numero_capedificio = $row['capacidad_maxima_edificio'];
    }

    // Aforo máximo dia
    $query_aforomaxdia= "SELECT NULLIF(COUNT(*),0) AS Dia FROM `edificio`,`puede` WHERE nombre_edificio = '$input_nombre_edificio' AND edificio.id_edificio = puede.id_edificio 
                      AND fecha_ingreso = '$dia'";
    $resultado_aforomaxdia=mysqli_query($conexion,$query_aforomaxdia);

    $numero_aforomaxdia = 0;
    while($row=mysqli_fetch_assoc($resultado_aforomaxdia)){
        $numero_aforomaxdia = $row['Dia'];
    }

    // Aforo máximo semana
    $query_aforomaxsemana= "SELECT NULLIF(COUNT(*),0) AS Semana FROM `edificio`,`puede` WHERE nombre_edificio = '$input_nombre_edificio' AND edificio.id_edificio = puede.id_edificio 
                      AND YEARWEEK(fecha_ingreso) = '$semana_mysql'";
    $resultado_aforomaxsemana=mysqli_query($conexion,$query_aforomaxsemana);

    $numero_aforomaxsemana = 0;
    while($row=mysqli_fetch_assoc($resultado_aforomaxsemana)){
        $numero_aforomaxsemana = $row['Semana'];
    }

    // Aforo máximo mes
    $query_aforomaxmes= "SELECT NULLIF(COUNT(*),0) AS Mes FROM `edificio`,`puede` WHERE nombre_edificio = '$input_nombre_edificio' AND edificio.id_edificio = puede.id_edificio 
                      AND EXTRACT(YEAR_MONTH FROM fecha_ingreso) = '$mes_mysql'";
    $resultado_aforomaxmes=mysqli_query($conexion,$query_aforomaxmes);

    $numero_aforomaxmes = 0;
    while($row=mysqli_fetch_assoc($resultado_aforomaxmes)){
        $numero_aforomaxmes = $row['Mes'];
    }

    // Tiempo aforo maximo dia
    $query_tiempoaforomaxdia = "SELECT TRUNCATE(SUM(TIME_TO_SEC(hora_salida) - TIME_TO_SEC(hora_ingreso))/60,0) as Tiempo_aforo_max_dia FROM `edificio`,`puede` WHERE edificio.nombre_edificio = '$input_nombre_edificio' 
                             AND edificio.id_edificio = puede.id_edificio AND fecha_ingreso = '$dia'";
    $resultado_tiempoaforomaxdia=mysqli_query($conexion,$query_tiempoaforomaxdia);

    $numero_tiempoaforomaxdia = 0;
    while($row=mysqli_fetch_assoc($resultado_tiempoaforomaxdia)){
        $numero_tiempoaforomaxdia = $row['Tiempo_aforo_max_dia'];
    }

    // Tiempo aforo maximo semana
    $query_tiempoaforomaxsemana = "SELECT TRUNCATE(SUM(TIME_TO_SEC(hora_salida) - TIME_TO_SEC(hora_ingreso))/60,0) as Tiempo_aforo_max_semana FROM `edificio`,`puede` WHERE edificio.nombre_edificio = '$input_nombre_edificio' 
                             AND edificio.id_edificio = puede.id_edificio AND YEARWEEK(fecha_ingreso) = '$semana_mysql'";
    $resultado_tiempoaforomaxsemana=mysqli_query($conexion,$query_tiempoaforomaxsemana);

    $numero_tiempoaforomaxsemana = 0;
    while($row=mysqli_fetch_assoc($resultado_tiempoaforomaxsemana)){
        $numero_tiempoaforomaxsemana = $row['Tiempo_aforo_max_semana'];
    }

    // Tiempo aforo maximo mes
    $query_tiempoaforomaxmes = "SELECT TRUNCATE(SUM(TIME_TO_SEC(hora_salida) - TIME_TO_SEC(hora_ingreso))/60,0) as Tiempo_aforo_max_mes FROM `edificio`,`puede` WHERE edificio.nombre_edificio = '$input_nombre_edificio' 
    AND edificio.id_edificio = puede.id_edificio AND EXTRACT(YEAR_MONTH FROM fecha_ingreso) = '$mes_mysql'";
    $resultado_tiempoaforomaxmes=mysqli_query($conexion,$query_tiempoaforomaxmes);
    
    $numero_tiempoaforomaxmes = 0;
    while($row=mysqli_fetch_assoc($resultado_tiempoaforomaxmes)){
        $numero_tiempoaforomaxmes = $row['Tiempo_aforo_max_mes'];
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aforo UCSC - Datos anteriores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="JS/funcion_datoant.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC - Datos anteriores
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active navbarlinks" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="envivo.php">En Vivo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="datosanteriores.php">Datos anteriores</a>
                </li>

                <a href="acceso.php">
                    <span class="material-icons iconousuario text-black">
                        account_circle
                    </span>
                </a>
            </ul>
        </div>
    </nav>

    <div class="container-fluid fondodatosanteriores">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-4"></div>
            <div class="col-lg-6 col-md-7 col-sm-8 margen_fecha">
                <form action="datosanteriores.php" method="GET">
                    <select name="input_nombre_edificio" class="edificios_datosant mb-2" required>
                        <option></option>
                        <?php
                        $querydatosant= "SELECT * FROM `edificio`";
                        $resultadodatosant=mysqli_query($conexion,$querydatosant);
                        
                        while($row=mysqli_fetch_assoc($resultadodatosant)){
                            $nombre_edificio_recibido = $row['nombre_edificio'];
                            $capacidad_maxima_edificio = $row['capacidad_maxima_edificio'];
                        ?>
                        <option><?php echo "$nombre_edificio_recibido"?></option>
                        <?php
                        }
                        ?>
                    </select>
                    
                    <br>
                    <div class="form-check d-inline-flex me-1 mb-3 mt-2">
                        <input onclick="mostrardia()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" required>
                        <label class="form-check-label ps-1" for="flexRadioDefault1">
                            Día
                        </label>
                    </div>
                    <div class="form-check d-inline-flex me-1">
                        <input onclick="mostrarsemana()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" required>
                        <label class="form-check-label ps-1" for="flexRadioDefault2">
                            Semana
                        </label>
                    </div>
                    <div class="form-check d-inline-flex">
                        <input onclick="mostrarmes()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" required>
                        <label class="form-check-label ps-1" for="flexRadioDefault3">
                            Mes
                        </label>
                    </div>
                    <br>
                    <input id="dia" type="date" name="dia_elegido" >
                    <input id="semana" type="WEEK" name="semana_elegido" >
                    <input id="mes" type="MONTH" name="mes_elegido" >
                    <button type="submit" value="buscar" class="btn btn-primary mb-4 buscar" type="button">Buscar</button>
                </form>
            </div>
        </div>

        <div class="row contenedor_datosanteriores">  
            <div class="col-lg-12 col-md-12 col-sm-12">
                <img src="CSS/logoucsc.png" alt="" class="logodatosant">
            </div>
            <div class="col-lg-6 col-md-7 col-sm-7 margendatosant">
                <h3>Nombre edificio</h3>
                <h3>Capacidad edificio</h3>
                <h3>Aforo máximo</h3>
                <h3>Tiempo aforo máx.</h3>
                <h3>Fecha</h3>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-5">
                <h3 align="center"><?php echo "$input_nombre_edificio"?><br></h3>
                <h3 align="center"><?php echo "$numero_capedificio"?> Personas</h3>
                <h3 align="center"><?php echo "$numero_aforomaxdia"?><?php echo "$numero_aforomaxsemana"?><?php echo "$numero_aforomaxmes"?> Personas</h3>
                <h3 align="center"><?php echo "$numero_tiempoaforomaxdia"?><?php echo "$numero_tiempoaforomaxsemana"?><?php echo "$numero_tiempoaforomaxmes"?> Minutos</h3>
                <h3 align="center"><?php echo "$dia"?><?php echo "$semana"?><?php echo "$mes"?></h3>
            </div>
            <a align="center" href="#" class="boton mt-5">
                <button value="imprimir" class="btn btn-primary" type="button">Imprimir</button>
            </a>
        </div>
    </div>

    <script>
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>