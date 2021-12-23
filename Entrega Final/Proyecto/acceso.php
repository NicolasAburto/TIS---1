<?php
    require("conexion.php");
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Aforo UCSC - Acceso</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC - Administrador
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

    <div class="container-fluid fondoacceso">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12">
                <div class="acceso_contenedor_info">
                    <h2 class="acceso_info_titulo">Información</h2>
                    <h2 class="acceso_info">En esta sección podrás gestionar el personal y los edificios de la universidad <br><br><strong>ATENCIÓN:</strong><br> Solo puedes ingresar si eres "Administrativo"</h2>
                </div>
            </div>
            
            <div class="col-lg-7 col-md-12 col-sm-12">
                <form action="funcion_acceder.php" method="POST">
                    <div class="contenedor-login">
                        <h2 class="acceso_titulo">Iniciar sesión</h2>
                        <h2 class="acceso_subtitulo">Administrador</h2>
                        <h5 class="acceso_margen">Run usuario <strong class="acceso_run_info">(Sin puntos, ni guion)</strong></h5>
                        <input class="acceso_margen acceso_input" name="input_user" type="text" placeholder="123456789" required>
                        <br>
                        <button type="submit" value="acceder" class="btn btn-primary mt-4 bg-black acceso_margen acceso_input" type="button">Acceder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>