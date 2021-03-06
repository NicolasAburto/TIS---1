<?php
    require("conexion.php");

    // cantidad actual
    $queryenvivo = "SELECT run_personal FROM `puede` WHERE fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivo=mysqli_query($conexion,$queryenvivo);
    $numero = mysqli_num_rows($resultadoenvivo);

    // Aforo maximo
    $queryenvivoaforomax = "SELECT run_personal FROM `puede`";
    $resultadoenvivoaforomax=mysqli_query($conexion,$queryenvivoaforomax);
    $numeroaforomax = mysqli_num_rows($resultadoenvivoaforomax);

    // Tiempo aforo maximo
    $queryenvivotiempoaforomax = "SELECT TRUNCATE(SUM(TIME_TO_SEC(hora_salida) - TIME_TO_SEC(hora_ingreso))/60,0) as Tiempo_aforo_max FROM `puede`";
    $resultadoenvivotiempoaforomax=mysqli_query($conexion,$queryenvivotiempoaforomax);

    $numerotiempoaforomax = 0;
    while($row=mysqli_fetch_assoc($resultadoenvivotiempoaforomax)){
        $numerotiempoaforomax = $row['Tiempo_aforo_max'];
    }

    // capacidad total edificios
    $queryenvivocaptotal= "SELECT capacidad_maxima_edificio FROM `edificio`";
    $resultadoenvivocaptotal=mysqli_query($conexion,$queryenvivocaptotal);

    $numerocaptotal = 0;
    while($row=mysqli_fetch_assoc($resultadoenvivocaptotal)){
        $numerocaptotal += $row['capacidad_maxima_edificio'];
    }

    // alumno
    $queryenvivoalum = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='alumno' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivoalum=mysqli_query($conexion,$queryenvivoalum);
    $numeroalum = mysqli_num_rows($resultadoenvivoalum);
    
    // docente
    $queryenvivodoc = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Docente' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivodoc=mysqli_query($conexion,$queryenvivodoc);
    $numerodoc = mysqli_num_rows($resultadoenvivodoc);

    // Administrativo
    $queryenvivoadm = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Administrativo' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivoadm=mysqli_query($conexion,$queryenvivoadm);
    $numeroadm = mysqli_num_rows($resultadoenvivoadm);

    // Auxiliar
    $queryenvivoaux = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Auxiliar aseo' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivoaux=mysqli_query($conexion,$queryenvivoaux);
    $numeroaux = mysqli_num_rows($resultadoenvivoaux);

    // Mantenci??n
    $queryenvivoman= "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Mantencion' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivoman=mysqli_query($conexion,$queryenvivoman);
    $numeroman = mysqli_num_rows($resultadoenvivoman);

    // Seguridad
    $queryenvivoseg = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Seguridad' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivoseg=mysqli_query($conexion,$queryenvivoseg);
    $numeroseg = mysqli_num_rows($resultadoenvivoseg);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Aforo UCSC - En vivo</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="JS/funcion_datoant.js"></script>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    
    <script src="jquery.js"></script>
    <script src="jquery.knob.js"></script>
    <script>
        $(document).ready(function() {
        $('.dial').knob({
            'min':0,
            'max':100,
            'width':250,
            'height':250,
            'displayInput':true,
            'fgColor':"#000000",
            'release':function(v) {$("").text(v);},
            'readOnly':true
        });
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC - En vivo
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

                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="faq.php">FAQ</a>
                </li>
                
                <a href="acceso.php">
                    <span class="material-icons iconousuario text-black">
                        account_circle
                    </span>
                </a>
            </ul>
        </div>
    </nav>

    <div class="container-fluid fondoportal">
        <div class="row capacontainer">
            <div class="col-lg-12">
                <div class="container contenedor_envivo" align="center">
                        <!--Borrar --cantidad-- -->
                        <h2 name="cantidad" class="cantidad_envivo"><?php echo "$numero"?></h2>
                        <h4 class="mb-5">Persona(s) actualmente</h4>
                        <input type="text" value="<?php $porcentaje= (($numero*100)/$numerocaptotal); echo round("$porcentaje")?>" class="dial">
                        <h2 class="mt-3 textocircle">Total persona(s) recinto (%)</h2>
                </div>
            </div>
            
            <div class="container-fluid">
                <button onclick="mostrargrafico()" value="mostgrafico" class="btn btn-primary mb-4 botongrafico" type="button">Mostrar gr??fico</button>
                <button value="pdf" class="btn btn-primary mb-4 botongrafico" type="button"><a  href="dompdf/generar_reporte_envivo.php"><label class="pdf">Generar Reporte</label></a></button>
                <div class="row contenedor_datosenvivo">
                    <div id="graph">
                        <canvas id="myChart" width="400" height="80" class="mb-5"></canvas>
                        <script>
                        const ctx = document.getElementById('myChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Capacidad total', 'Aforo m??ximo', 'Alumnos', 
                                'Docentes', 'Administrativos', 'Auxiliar', 'Mantenci??n', 'Seguridad'],
                                datasets: [{
                                    label: 'Gr??fico en vivo',
                                    data: [<?php echo "$numerocaptotal"?> , <?php echo "$numeroaforomax"?>, <?php echo "$numeroalum"?>,
                                    <?php echo "$numerodoc"?>, <?php echo "$numeroadm"?>, <?php echo "$numeroaux"?>,<?php echo "$numeroman"?>, <?php echo "$numeroseg"?>],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                        </script>
                    </div>
                    
                    <div class="col-lg-3 col-md-5 col-sm-7">
                        <h3>Capacidad total</h3>
                        <h3>Aforo m??ximo</h3>
                        <h3>Tiempo aforo m??x.</h3>
                        <h3>Alumnos</h3>
                        <h3>Docentes</h3>
                        <h3>Administrativos</h3>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-5">
                        <h3><?php echo "$numerocaptotal"?> Personas</h3>
                        <h3><?php echo "$numeroaforomax"?> Personas</h3>
                        <h3><?php echo "$numerotiempoaforomax"?> Minutos</h3>
                        <h3><?php echo "$numeroalum"?> Personas</h3>
                        <h3><?php echo "$numerodoc"?> Personas</h3>
                        <h3><?php echo "$numeroadm"?> Personas</h3>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-7">
                        <h3>Auxiliar</h3>
                        <h3>Mantenci??n</h3>
                        <h3>Seguridad</h3>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-5">
                        <h3><?php echo "$numeroaux"?> Personas</h3>
                        <h3><?php echo "$numeroman"?> Personas</h3>
                        <h3><?php echo "$numeroseg"?> Personas</h3>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-12">
                <footer class="footerenvivo">
                    <p class="textofooterenvivo">Unidad de Infraestructura DO - UCSC. Todos los derechos reservados 2021
                        <span class="material-icons copyenvivo">
                            copyright
                        </span>
                    </p>
                    <a href="https://portal.ucsc.cl/">
                        <label class="linkfooterenvivo">Ir a Portal Institucional</label>
                    </a>
                </footer>
            </div>
        </div>
    </div>

    <!-- Actualizar pagina (funciona) -->
    <script>
        var x = document.getElementById("graph");
        let counter = 1;
        setInterval(() =>{
            if (x.style.display == "block") {

            }else{
                if(counter > 3) location.reload();
            }
            counter ++;
            
        }, 1000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>