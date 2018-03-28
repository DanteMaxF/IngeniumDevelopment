<?php 
    session_start();
    require_once("util.php");
    $nombreUsuario = $_POST["nombreUsuario"];
    $passwd =  $_POST["passwd"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    registrarUsuario($nombreUsuario,$passwd,$correo,$telefono);
    $_SESSION["message"] = 'Los datos han sido guardados';
    header("location:index.php");
?>