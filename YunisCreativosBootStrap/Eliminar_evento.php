<?php

    session_start();
    require_once("util.php");
    
    eliminarEvento( $_GET["idEvento"]);
    
    header("location:consultar_eventos.php");
?>