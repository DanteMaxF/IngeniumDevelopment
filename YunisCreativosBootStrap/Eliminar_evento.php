<?php

    session_start();
    require_once("util.php");
    
    EliminarEvento( $_GET["idEvento"]);
    
    header("location:consultar_eventos.php");
?>