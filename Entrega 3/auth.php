<?php
    session_start();
    if(!isset($_SESSION["input_user"])){
        header("Location: acceso.php");
        exit(); 
    }
?>
