
<?php
  require("../conexion.php");
 ?>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../estilo.css">
      <title>Edificios</title></head>
  <body>
      <table style="width: 500px; text-align: left;">
        <thead>
          <tr>
            <th>Nombre Edificio</th>
            <th>Capacidad Maxima</th>
            <th>Operaciones</th>
            <th><a class="btn btn-dark" href="crear-edificio.php" role="button">Crear</a></th>
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
                echo "<td>
                        <form action='eliminar-edificio.php' method='POST'>
                          <input type='hidden' name='id_edificio' value='".$id_edificio."'>
                          <button type='submit' style='float:left;margin-right:5px'>Eliminar</button>
                        </form>
                        <a href='editar-edificio.php?id_edificio=".$id_edificio."'>
                          <button>Editar</button>
                        </a>
                      </td>";
              echo "</tr>";
            }
          ?>
        </tbody>
        </table>
    </div>
  </body>
</html>
