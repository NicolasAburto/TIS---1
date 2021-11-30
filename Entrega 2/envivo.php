<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Aforo UCSC - En vivo</title>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.ucsc.cl/">
                <img src="CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC  - En vivo
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active navbarlinks" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="envivo.php">En Vivo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="#">Datos anteriores</a>
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
            <div class="col-lg-12 border">
                <div class="container contenedor_portal">
                    <div class="col">
                        <!--Borrar --cantidad-- -->
                        <h2 name="cantidad">--Cantidad--</h2>
                        <h4>Personas actualmente</h4>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-12 border">
                <div class="container-fluid containerinfoenvivo">
                    <div class="row">
                        <div class="col">
                            <h3>Capacidad total</h3>
                            <h3>Aforo máximo</h3>
                            <h3>Tiempo aforo máx.</h3>
                            <h3>Alumnos</h3>
                            <h3>Docentes</h3>
                            <h3>Administrativos</h3>
                        </div>
                        <div class="col">
                            <h3>--cantidad</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-12">
                <footer>
                    <p>Unidad de Infraestructura DO - UCSC.</p>
                    <a href="https://portal.ucsc.cl/">
                        <label>Ir a Portal Institucional</label>
                    </a>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
