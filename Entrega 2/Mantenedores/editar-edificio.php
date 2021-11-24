<?php
  require("../conexion.php");

  $id_edificio = $_GET['id_edificio'];
  $consulta = "SELECT * FROM edificio WHERE id_edificio = $id_edificio";
  $result = mysqli_query($conexion,$consulta);
 ?>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../estilo.css">
      <title>Edificios</title></head>
  <body>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre Edificio</th>
          <th scope="col">Capacidad Maxima</th>
          <th scope="col">Operaciones</th>
          <th><a class="d-inline btn btn-dark" href="crear-edificio.php" role="button">Crear</a></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <form class="" action="update-edificio.php" method="post">
            <?php
              while($row=mysqli_fetch_assoc($result)){
                $id_edificio = $row['id_edificio'];
                $nombre_edificio = $row['nombre_edificio'];
                $capacidad_maxima_edificio = $row['capacidad_maxima_edificio'];
                echo "<input type='hidden' name='id_edificio' value='".$row['id_edificio']."'/>";
                echo "<td><input type='text' name='nombre_edificio' value='".$nombre_edificio."'</td>";
                echo "<td><input type='text' name='capacidad_maxima_edificio' value='".$capacidad_maxima_edificio."'</td>";
                echo "<td class='p-0'><input class='m-2 btn btn-dark' type='submit' value='Guardar Cambios'></td>";
              }
            ?>
          </form>
        </tr>
      </tbody>
  </body>
</html>
