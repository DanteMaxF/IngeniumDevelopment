<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
         if (eliminarPlantilla($_GET["idDiseno"])){
            $_SESSION["plantillaStatusSuccess"] = "Se ha eliminado la plantilla exitosamente";
            unset($_SESSION["plantillaStatusError"]);
        }else{
            $_SESSION["plantillaStatusError"] = "Hubo un error en la eliminación, inténtalo de nuevo más tarde";
            unset($_SESSION["plantillaStatusSuccess"]);
        }
        header('location:plantillas.php?eventInput='.$_SESSION["idDiseno"]);
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>