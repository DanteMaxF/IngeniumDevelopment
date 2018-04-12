<?php
    session_start();
    require_once("util.php");

     if (eliminarUsuario($_GET["id"])){
        $_SESSION["staffStatusSuccess"] = "Se ha eliminado al usuario exitosamente";
        unset($_SESSION["staffStatusError"]);
    }else{
        $_SESSION["staffStatusError"] = "Hubo un error en la eliminación, inténtalo de nuevo más tarde";
        unset($_SESSION["staffStatusSuccess"]);
    }
    
            
    
    header('location:consulta_de_usuarios.php?eventInput='.$_SESSION["idEvento"]);
?>