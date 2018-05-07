<?php

    session_start();
    require_once("util.php");
    if(  isset($_SESSION["idRol"]) && ($_SESSION["idRol"] ==1492 || $_SESSION["idRol"] ==1496) ){
        if (desasignarInvitado( $_SESSION["idEvento"], $_GET["idInvitado"])){
            $_SESSION["staffStatusSuccess"] = "Se ha desasignado el invitado exitosamente";
            unset($_SESSION["staffStatusError"]);
        }else{
            $_SESSION["staffStatusError"] = "Hubo un error en la desasignación, inténtalo de nuevo más tarde";
            unset($_SESSION["staffStatusSuccess"]);
        }
    
        header('location:consultar_eventos.php?eventInput='.$_SESSION["idEvento"]);
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>