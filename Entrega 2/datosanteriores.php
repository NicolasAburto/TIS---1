<?php
    require("conexion.php");
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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.ucsc.cl/">
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
                <div class="form-check d-inline-flex me-1 mb-3 mt-4">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label ps-1" for="flexRadioDefault1">
                        Día
                    </label>
                </div>
                <div class="form-check d-inline-flex me-1">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label ps-1" for="flexRadioDefault2">
                        Mes
                    </label>
                </div>
                <div class="form-check d-inline-flex">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label ps-1" for="flexRadioDefault2">
                        Año
                    </label>
                </div>
                <br>
                <input type="date" name="fecha_elegida" class="">
                <br>
                <button type="submit" value="buscar" class="btn btn-primary ms- mt-3 mb-4 buscar"  type="button">Buscar</button>
            </div>
        </div>
        <div class="row contenedor_datosanteriores">  
            <div class="col-lg-12 col-md-12 col-sm-12">
                <img src="CSS/logoucsc.png" alt="" class="logodatosant">
            </div>
            <div class="col-lg-6 col-md-8 col-sm-7 margendatosant">
                <h3>Nombre edificio</h3>
                <h3 >Capacidad edificio</h3>
                <h3>Aforo máximo</h3>
                <h3>Tiempo aforo máx.</h3>
                <h3>Aforo mínimo</h3>
                <h3>Tiempo aforo mín.</h3>
                <h3>Fecha</h3>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-5">
                <h3 align="center">300 Personas</h3>
                <h3 align="center">300 Personas</h3>
                <h3 align="center">--cantidad--</h3>
                <h3 align="center">--cantidad--</h3>
                <h3 align="center">--cantidad--</h3>
                <h3 align="center">--cantidad--</h3>
                <h3  align="center" name="fecha_elegida" value="fecha_elegida"></h3>
            </div>
            <a align="center" href="#" class="boton mt-5">
                <button value="imprimir" class="btn btn-primary" type="button">Imprimir</button>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
