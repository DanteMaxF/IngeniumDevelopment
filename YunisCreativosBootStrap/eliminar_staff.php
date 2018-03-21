<?php

    session_start();
    require_once("util.php");
    
    eliminarStaff( $_SESSION["evento"], $_GET["idStaff"]);
    unset($_SESSION["evento"]);
    unset($_SESSION["idEvento"]);
            
    
    header("location:consultar_eventos.php");
?>