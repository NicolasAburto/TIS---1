
<?php
  require("conexion.php");
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
          <th><a class="d-inline btn btn-dark" href="index_manten.php" role="button">Atrás</a></th>
        </tr>
      </thead>
      <tbody>
        <?php
          $consulta = "SELECT * FROM edificio";
          $resultado = mysqli_query($conexion, $consulta);

          while($row=mysqli_fetch_assoc($resultado)){
            $id_edificio = $row['id_edificio'];
            $nombre_edificio = $row['nombre_edificio'];
            $capacidad_maxima_edificio = $row['capacidad_maxima_edificio'];
            echo "<tr>";
              echo "<td>".$nombre_edificio."</td>";
              echo "<td>".$capacidad_maxima_edificio."</td>";
              echo "<td class='p-0'>
                      <a class='m-2 btn btn-dark' href='editar-edificio.php?id_edificio=".$id_edificio."' role='button'>Editar</a>
                      <form class='d-inline' action='eliminar-edificio.php' method='POST'>
                        <input type='hidden' name='id_edificio' value='".$id_edificio."'>
                        <button class='m-2 btn btn-dark' type='submit'>Eliminar</button>
                      </form>
                    </td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </div>
  </body>
</html>
