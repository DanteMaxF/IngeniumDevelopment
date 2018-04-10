<?php

    session_start();
    require_once("util.php");
    $idUsuario = $_GET["idStaff"];
    if ((eliminarStaff( $_SESSION["evento"], $_GET["idStaff"])) AND ( eliminarStaffPerma($idUsuario))){
        echo "xdxdxdxd :V";
        die('');
        $_SESSION["staffStatusSuccess"] = "Se ha eliminado el staff exitosamente";
        unset($_SESSION["staffStatusError"]);
    }else{
        $_SESSION["staffStatusError"] = "Hubo un error en la eliminación, inténtalo de nuevo más tarde";
        echo "no se armo";
        die('');
        unset($_SESSION["staffStatusSuccess"]);
    }
    
            
    
    header('location:consulta_de_usuarios.php');
?>