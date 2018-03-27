<?php 
    session_start();
    require_once("util.php");
    $nombreUsuario = $_POST["nombreUsuario"];
    $passwd =  $_POST["passwd"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $idInvitado = getIDUserByMail($_POST["correo"]);
    $Descripcion = $_POST["Descripcion"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $talla = $_POST["talla"];
    $idEstado = getIDEstado($_POST["Estado"]);
     var_dump($idEstado); 
     die('');
    
    
    registrarUsuario($nombreUsuario,$passwd,$correo,$telefono);
    registrarInvitado($correo,$fechaNacimiento,$talla,$idEstado);
    $_SESSION["message"] = 'Los datos han sido guardados';
    header("location:index.php");
?>