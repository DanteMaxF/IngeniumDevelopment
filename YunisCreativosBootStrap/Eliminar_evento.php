<?php
    session_start();
    require_once("util.php");

    eliminarEvento($_GET["idEvento"]);

    $_SESSION["staffStatusSuccess"] = "Se ha eliminado el evento exitosamente";

   header('location:consultar_eventos.php?eventInput=-');
?>