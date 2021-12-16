<?php

    require("conexion.php");

    // cantidad actual
    $queryenvivo = "SELECT run_personal FROM `puede` WHERE fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivo=mysqli_query($conexion,$queryenvivo);
    $numero = mysqli_num_rows($resultadoenvivo);

    // capacidad total edificios
    $queryenvivocaptotal= "SELECT capacidad_maxima_edificio FROM `edificio`";
    $resultadoenvivocaptotal=mysqli_query($conexion,$queryenvivocaptotal);
    $numerocaptotal = 0;
    while($row=mysqli_fetch_assoc($resultadoenvivocaptotal)){
        $numerocaptotal += $row['capacidad_maxima_edificio'];
    }

    // cantidad actual educacion
    $queryeduca = "SELECT * FROM `puede` WHERE fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida AND id_edificio = 2";
    $resactualeduca=mysqli_query($conexion,$queryeduca);
    $actualeduca = mysqli_num_rows($resactualeduca);
    // cantidad total edificio educacion
    $querytotaleduca = "SELECT capacidad_maxima_edificio FROM `edificio` WHERE id_edificio = 2";
    $restotalaleduca=mysqli_query($conexion,$querytotaleduca);
    $totaleduca = 0;
    while($row=mysqli_fetch_assoc($restotalaleduca)){
        $totaleduca += $row['capacidad_maxima_edificio'];
    }

    // cantidad actual periodismo
    $queryperiodismo = "SELECT * FROM `puede` WHERE fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida AND id_edificio = 3";
    $resactualperiodismo=mysqli_query($conexion,$queryperiodismo);
    $actualperiodismmo = mysqli_num_rows($resactualperiodismo);
    // cantidad total edificio pediodismo
    $querytotalperiodismo = "SELECT capacidad_maxima_edificio FROM `edificio` WHERE id_edificio = 3";
    $restotalalperiodismo=mysqli_query($conexion,$querytotalperiodismo);
    $totalperiodismo = 0;
    while($row=mysqli_fetch_assoc($restotalalperiodismo)){
        $totalperiodismo += $row['capacidad_maxima_edificio'];
    }

    $porcentajetotal = round(($numero*100)/($numerocaptotal),0);
    $porcentajeeduca = round(($actualeduca*100)/($totaleduca),0);
    $porcentajeperiodismo = round(($actualperiodismmo*100)/($totalperiodismo),0);

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Total Campus', 0],
          ['Educación', 0],
          ['Periodismo', 0]
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          greenFrom: 0, greenTo:75,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(0, 1, <?php echo $porcentajetotal;?>);
          chart.draw(data, options);
        }, 1000);
        setInterval(function() {
          data.setValue(1, 1, <?php echo $porcentajeeduca;?>);
          chart.draw(data, options);
        }, 1000);
        setInterval(function() {
          data.setValue(2, 1, <?php echo $porcentajeperiodismo;?>);
          chart.draw(data, options);
        }, 1000);
      }
    </script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <div id="chart_div" style="width: 400px; height: 120px;"></div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
