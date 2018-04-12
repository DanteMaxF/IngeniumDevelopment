<?php
    session_start();
    require_once("util.php");

     eliminarStaffPerma($_GET["idUsurio"]);

    $_SESSION["message"] = 'El evento '.$_GET["nombreUsuario"].' se eliminó correctamente';

   header('location:consulta_de_usuarios.php?eventInput=-');
?>