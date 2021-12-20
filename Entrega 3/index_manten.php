<?php
    include("auth.php"); 
    require("conexion.php");

    $query= "SELECT nombre FROM `personal` WHERE run = '$_SESSION[input_user]'";
    $resultado=mysqli_query($conexion,$query);

    while($row=mysqli_fetch_assoc($resultado)){
        $nombre = $row['nombre'];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenedores</title>

    <link rel="stylesheet" href="CSS/estilo_mantenedor.css">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC - Mantenedor
            </a>
            <a align="center" href="logout.php" class="cerrarsesion boton">
                <button value="cerrarsesion" class="btn btn-primary" type="button">Cerrar sesión</button>
            </a>

        </div>
    </nav>

    <div class="container-fluid fondo">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <h1 class="titulo_mantenedor mb-3" align="center">Bienvenido/a <?php echo "$nombre"?>!!!</h1>
                <h1 class="subtitulo_mantenedor" align="center">Administrador - Mantenedores</h1>
            </div>
            <div class="col-lg-6 mt-5" align="center">
                <div class="mantenedor">
                    <h1>Personal</h1>
                    <a href="Mantenedor_personal\index_personal.php" class="boton"><button class="btn btn-primary mt-3" type="button">Entrar</button></a>
                </div>
            </div>

            <div class="col-lg-6 mt-5" align="center">
                <div class="mantenedor">
                    <h1>Edificio</h1>
                    <a href="Mantenedor_edificio/edificios.php" class="boton"><button class="btn btn-primary mt-3" type="button">Entrar</button></a>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
