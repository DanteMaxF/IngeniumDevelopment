<?php

    session_start();
    require_once("util.php");
    
    eliminarStaff( $_SESSION["evento"], $_GET["idStaff"]);
    
    header("location:consultar_eventos.php");
?>