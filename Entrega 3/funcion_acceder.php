<?php
    require("conexion.php");
    session_start();
    if (isset($_POST['input_user'])){
        $username = stripslashes($_REQUEST['input_user']); // removes backslashes
        $username = mysqli_real_escape_string($conexion,$username); //escapes special characters in a string
          
          //Checking is user existing in the database or not
        $query = "SELECT * FROM `personal` WHERE run='$username' AND cargo='Administrativo'";
      	$result = mysqli_query($conexion,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['input_user'] = $username;
      		header("Location: index_manten.php"); // Redirect user to index.php
        }else{
      		echo "<div class='form'><h3>Usuario/Contraseña Incorrecto</h3><br/>Haz click aquí para <a href='acceso.php'>Logearte</a></div>";
        }
    }
?>