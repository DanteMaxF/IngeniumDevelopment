<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
         if (eliminarUsuario($_GET["idStaff"])){
            $_SESSION["staffStatusSuccess"] = "Se ha eliminado el staff exitosamente";
            unset($_SESSION["staffStatusError"]);
        }else{
            $_SESSION["staffStatusError"] = "Hubo un error en la eliminación, inténtalo de nuevo más tarde";
            unset($_SESSION["staffStatusSuccess"]);
        }
        header('location:consulta_de_usuarios.php?eventInput='.$_SESSION["idEvento"]);
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>