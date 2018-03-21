<?php
    session_start();
    require_once("util.php");

    eliminarEvento($_GET["idEvento"]);

    $_SESSION["message"] = 'El evento '.$_GET["nombreEvento"].' se eliminó correctamente';

   header('location:consultar_eventos.php?eventInput=""');
?>