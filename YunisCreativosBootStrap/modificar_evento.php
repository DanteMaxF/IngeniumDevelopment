<?php
 session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
        $idEvento = $_POST["idEvento"];
        $nombreEmpresa = $_POST["nombreEmpresa"];
        $descripcionEvento = $_POST["descripcionEvento"];
        $estadoEvento = $_POST["estadoEvento"];
        $nombreCliente = $_POST["nombreCliente"];
        $nombreCoordinador = $_POST["nombreCoordinador"];
        echo $idEvento;
        echo $nombreEmpresa;
        echo $descripcionEvento;
        echo $estadoEvento;
        echo $nombreCliente;
        echo $nombreCoordinador;
        //die('');
        
         if ( modificarEvento($nombreEmpresa, $descripcionEvento, $estadoEvento, $nombreCliente, $nombreCoordinador, $idEvento)){
            $_SESSION["staffStatusSuccess"] = "Se ha modificado la información exitosamente";
            unset($_SESSION["staffStatusError"]);
        }else{
            $_SESSION["staffStatusError"] = "Hubo un error con la modificación, inténtalo de nuevo más tarde";
            unset($_SESSION["staffStatusSuccess"]);
        }
        header('location:consulta_de_usuarios.php?eventInput='.$_SESSION["idEvento"]);
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>