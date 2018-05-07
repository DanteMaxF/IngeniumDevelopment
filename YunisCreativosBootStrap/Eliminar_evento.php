<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"] ==1492){
        eliminarEvento($_GET["idEvento"]);
    
        $_SESSION["staffStatusSuccess"] = "Se ha eliminado el evento exitosamente";
    
        header('location:consultar_eventos.php?eventInput=-');
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>