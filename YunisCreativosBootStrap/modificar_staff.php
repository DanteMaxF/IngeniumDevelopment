<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"])  && $_SESSION["idRol"]==1492 ){
        $idUsuario = $_POST["id"];
        $nombreUsuario = $_POST["nombreUsuario"];
        $apellidoP = $_POST["apellidoP"];
        $apellidoM = $_POST["apellidoM"];
        $passwd = $_POST["passwd2"];
        $correo = $_POST["correo"];
        $lada = $_POST["lada"];
        $telefono = $_POST["telefono"];
        $rol = $_POST["rol"];
        echo 'lada:'.$lada.'<br>';
        echo 'apellido P:'.$apellidoP.'<br>';
        echo 'apellido M:'.$apellidoM.'<br>';
        echo $idUsuario.'<br>';
        echo  $nombreUsuario.'<br>';
        echo $passwd.'<br>';
        echo $correo.'<br>';
        echo $telefono.'<br>';
        echo $rol;
        //die('');
        
         if (modificarUsuario($nombreUsuario,$apellidoP,$apellidoM,$passwd,$correo,$lada,$telefono,$idUsuario)){
            if(modificarRol($idUsuario,$rol)){
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