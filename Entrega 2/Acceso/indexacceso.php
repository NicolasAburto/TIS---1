<?php
    $conexion = mysqli_connect("localhost","root","","aforoucsc2");
?>

<!doctype html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Acceso a un Edificio UCSC - Campus San Andrés</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.ucsc.cl/">
                <img src="https://www.ucsc.cl/wp-content/uploads/2015/01/logo_horizontal_color_sinfondo.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC - Acceso Edificios Campus San Andrés
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active navbarlinks" aria-current="page" href="../index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="../envivo.php">En Vivo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="../datosanteriores.php">Datos anteriores</a>
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
            <div class="container-fluid">
                <form action="ingresar.php" method="POST">
                    <h5>Ingrese su rut:</h5>
                    <input type="text" name="rut_acceso" placeholder="123456789">
                    <h5>Seleccione edificio a Acceder:</h5>
                    <input type="text" name="edificio_acceso" placeholder="ID Edificio">
                    <h5>Ingrese fecha de Acceso:</h5>
                    <input type="date" name="fecha_acceso">
                    <h5>Ingrese hora de ingreso al edificio:</h5>
                    <input type="time" name="hora_ingreso">
                    <h5>Ingrese hora de abandono del edificio:</h5>
                    <input type="time" name="hora_salida">
                    <br>
                    <input type="submit" value="Ingresar">
                </form>
                <hr>
                <?php
                    $queryenvivo = "SELECT run_personal FROM `puede` WHERE fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
                    $resultadoenvivo=mysqli_query($conexion,$queryenvivo);
                    $numero = mysqli_num_rows($resultadoenvivo);
                    echo 'Personas actualmente en el campus: ' . $numero;
                 ?>
                <hr>
                <h3>Listado Edificios UCSC</h3>

                <?php
                    $consulta="SELECT * FROM edificio";
                    $resultado=mysqli_query($conexion,$consulta);

                    while($row=mysqli_fetch_assoc($resultado)){
                        $id_recibido = $row["id_edificio"];
                        $nombre_recibido = $row["nombre_edificio"];
                        $capmax_recibido = $row["capacidad_maxima_edificio"];
                        echo "<p>".$id_recibido." ".$nombre_recibido." ".$capmax_recibido."</p>";
                    }
                ?>
                            
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
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>

