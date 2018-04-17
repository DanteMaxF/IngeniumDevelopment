<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
        $idUsuario = $_POST["id"];
        $nombreUsuario = $_POST["nombreUsuario"];
        $passwd = $_POST["passwd2"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        echo $idUsuario;
        echo  $nombreUsuario;
        echo $passwd;
        echo $correo;
        echo $telefono;
        //die('');
        
         if (modificarUsuario($idUsuario,$nombreUsuario,$passwd,$correo,$telefono)){
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
    //modificarUsuario($idUsuario,$nombreUsuario,$passwd,$correo,$telefono)
?>