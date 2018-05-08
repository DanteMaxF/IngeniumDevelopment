<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && ($_SESSION["idRol"]==1492 || $_SESSION["idRol"]==1496 || $_SESSION["idRol"]==1495 ) ){
        $idUsuario = $_POST["id"];
        $nombreUsuario = $_POST["nombreUsuario"];
        $passwd = $_POST["passwd2"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $idEstado = $_POST["Estado"];
        $talla = $_POST["talla"];
        $idIdioma =$_POST["idioma"];
        $asistencia = $_POST["asistencia"];
        $alergias = $_POST["alergias"];
        $medicamentos = $_POST["medicamentos"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        echo 'id: '.$idUsuario.'<br>';
        echo 'nombreUsuario: '.$nombreUsuario.'<br>';
        echo 'password: '.$passwd.'<br>';
        echo 'correo: '.$correo.'<br>';
        echo 'telefono: '.$telefono.'<br>';
        echo 'Estado: '.$idEstado.'<br>';
        echo 'talla: '.$idTalla.'<br>';
        echo 'idioma: '.$idIdioma.'<br>';
        echo 'asistencia: '.$asistencia.'<br>';
        echo 'alergias: '.$alergias.'<br>';
        echo 'medicamentos: '.$medicamentos.'<br>';
        //die('');
        
         if (modificarUsuario($nombreUsuario,$passwd,$correo,$telefono,$idUsuario)){
            if(modificarInvitado($idEstado, $talla, $idIdioma, $asistencia, $alergias, $medicamentos,  $fechaNacimiento , $idInvitado)){
                $_SESSION["staffStatusSuccess"] = "Se ha modificado la información exitosamente";
                unset($_SESSION["staffStatusError"]);
            }
        }else{
            $_SESSION["staffStatusError"] = "Hubo un error con la modificación, inténtalo de nuevo más tarde";
            unset($_SESSION["staffStatusSuccess"]);
        }
        header('location:consulta_de_usuarios.php?eventInput='.$_SESSION["idEvento"]);
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
    //modificarUsuario($idUsuario,$nombreUsuario,$passwd,$correo,$telefono)
?>