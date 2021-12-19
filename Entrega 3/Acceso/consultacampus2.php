<?php
    require("../conexion.php");

    //$sql="SELECT nombre_edificio, porcentaje FROM `envivo`"
    //$resultado=mysqli_query($conexion,$sql);


    $resultado=$conexion->query("SELECT nombre_edificio, porcentaje FROM `envivo`");
    
    echo '<table class="table" style="font-size:12px; margin-top:-1%;">

				<tr class="active">
					<th>EDIFICIO</th>
					<th>PORCENTAJE VISITADO</th>
				</tr>';

				while ($filaEdificios = $resultado->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						 <td>'.$filaEdificios['nombre_edificio'].'</td>
						 <td>'.round($filaEdificios['porcentaje'],0).' %</td>
						 </tr>';
				}
				echo '</table>';

?>