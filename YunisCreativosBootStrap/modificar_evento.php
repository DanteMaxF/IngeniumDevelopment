<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
        $idEvento = $_POST["idEvento"];
        $nombreEmpresa = $_POST["nombreEmpresa"];
        $descripcionEvento = $_POST["descripcionEvento"];
        $statusEvento = $_POST["estadoEvento"];
        $codigo = $_POST["codigoEvento"];
        $idCoordinador = $_POST["coordinador"];
        $idCliente = $_POST["cliente"];
        $idDiseno = $_POST["plantilla"];
        echo 'idEvento: '.$idEvento.'<br>';
        echo 'nombre empresa: '.$nombreEmpresa.'<br>';
        echo 'descripcion Evento: '.$descripcionEvento.'<br>';
        echo 'estado Evento: '.$statusEvento.'<br>';
        echo 'codigo: '.$codigo.'<br>';
        echo 'id coordinador: '.$idCoordinador.'<br>';
        echo 'id cliente: '.$idCliente.'<br>';
        echo 'plantilla: '.$idDiseno.'<br>';
        //die('');
        
         if (modificarEvento($nombreEmpresa,$descripcionEvento,$statusEvento,$codigo,$idCoordinador,$idCliente,$idDiseno,$idEvento)){
                $_SESSION["staffStatusSuccess"] = "Se ha modificado la información exitosamente";
                unset($_SESSION["staffStatusError"]);
        }else{
            $_SESSION["staffStatusError"] = "Hubo un error con la modificación, inténtalo de nuevo más tarde";
            unset($_SESSION["staffStatusSuccess"]);
        }
        header('location:consultar_eventos.php?eventInput='.$_SESSION["idEvento"]);
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>