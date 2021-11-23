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
    <div>
        <h1>Crear Edificio</h1>
        <form class="" action="insertar-edificio.php" method="post">
          <label for="id_edificio">ID Edificio</label>
          <input type="text" name="id_edificio">
          <label for="nombre_edificio">Nombre Edificio</label>
          <input type="text" name="nombre_edificio">
          <label for="capacidad_maxima_edificio">Aforo Maximo</label>
          <input type="text" name="capacidad_maxima_edificio">
          <button type="submit">Guardar</button>
        </form>
    </div>
  </body>
</html>
