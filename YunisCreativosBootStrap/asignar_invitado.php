<?php

    session_start();
    require_once("util.php");
    

    
    if(asignarInvitado($_SESSION["idEvento"],$_POST["invitadoInput"])){
        $_SESSION["staffStatusSuccess"] = "Se ha registrado <strong>".$_POST["invitadoInput"]."</strong> exitosamente";
        unset($_SESSION["staffStatusError"]);
    }else{
        $_SESSION["staffStatusError"] = "Hubo un error en el registro, inténtalo de nuevo más tarde";
        unset($_SESSION["staffStatusSuccess"]);
        
    }
 
    header('location:consultar_eventos.php?eventInput='.$_SESSION["idEvento"]);
    
?>