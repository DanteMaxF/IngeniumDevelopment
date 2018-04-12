<?php
    session_start();
    require_once("util.php");

     if ((eliminarStaffPerma($_GET["idStaff"])) && (eliminarStaff( $_SESSION["evento"], $_GET["idStaff"]))){
        $_SESSION["staffStatusSuccess"] = "Se ha eliminado el staff exitosamente";
        unset($_SESSION["staffStatusError"]);
    }else{
        $_SESSION["staffStatusError"] = "Hubo un error en la eliminación, inténtalo de nuevo más tarde";
        unset($_SESSION["staffStatusSuccess"]);
    }
    
            
    
    header('location:consulta_de_usuarios.php?eventInput='.$_SESSION["idEvento"]);
?>