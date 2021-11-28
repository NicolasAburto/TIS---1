<?php
    require("conexion.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
        <title>Aforo UCSC</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.ucsc.cl/">
                <img src="CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC - Administrador
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="portal.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="envivo.php">En Vivo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Datos anteriores</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="fondoacceso">
        <div class="container contenedor-login">
            <div class="col">
                <div class="row margen">
                    <h2>Acceso UCSC</h2>
                    <label>Usuario</label>
                    <input name="user" type="text">
                    <label>Contaseña</label>
                    <input name="pass" type="password">
                    <div align="center" class="reg">
                        <a href="#">
                            <label>Registrarse</label>
                        </a>
                    </div>
                    <a align="center" href="index_manten.php"><button class="btn btn-primary" type="button">Acceder</button></a>
                </div>
            </div>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
