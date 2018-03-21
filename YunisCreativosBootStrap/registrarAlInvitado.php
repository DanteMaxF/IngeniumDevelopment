<?php 
    session_start();
    require_once("util.php");
    registrarUsuario($_POST["nombreUsuario,passwd, correo,telefono"]);
    registrarInvitado($_POST[getIDUserByMail($_POST["correo"])], "Descripcion,fechaNacimiento,talla,idEstado");
    $_SESSION["message"] = 'Los datos han sido guardados';
    header("location:index.php");
?>