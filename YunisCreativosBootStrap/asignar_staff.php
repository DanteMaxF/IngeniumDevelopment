<?php

    session_start();
    require_once("util.php");
    
    if(asignarStaff($_SESSION["idEvento"],getIdByNombreUsuario($_POST["staffInput"]))){
        $_SESSION["staffStatusSuccess"] = "Se ha registrado <strong>".$_POST["staffInput"]."</strong> exitosamente";
        unset($_SESSION["staffStatusError"]);
    }else{
        $_SESSION["staffStatusError"] = "Hubo un error en el registro, inténtalo de nuevo más tarde";
        unset($_SESSION["staffStatusSuccess"]);
        
    }
 
    header('location:consultar_eventos.php?eventInput='.$_SESSION["evento"]);
?>