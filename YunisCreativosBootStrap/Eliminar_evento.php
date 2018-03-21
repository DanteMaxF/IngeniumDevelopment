<?php

    session_start();
    require_once("util.php");
    
    EliminarEvento( $_GET["idEvento"]);
    unset($_SESSION["evento"]);
    unset($_SESSION["idEvento"]);
            
    header("location:consultar_eventos.php");
?>