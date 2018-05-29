<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && ($_SESSION["idRol"]==1492 || $_SESSION["idRol"]==1496 || $_SESSION["idRol"]==1495 ) ){
        $idUsuario = $_POST["id"];
        $nombreUsuario = $_POST["nombreUsuario"];
        $apellidoP = $_POST["apellidoP"];
        $apellidoM = $_POST["apellidoM"];
        $passwd = $_POST["passwd2"];
        $correo = $_POST["correo"];
        $lada = $_POST["lada"];
        $telefono = $_POST["telefono"];
        $idEstado = $_POST["Estado"];
        $talla = $_POST["talla"];
        $idIdioma =$_POST["idioma"];
        $asistencia = $_POST["asistencia"];
        $alergias = $_POST["alergias"];
        $medicamentos = $_POST["medicamentos"];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $year = $_POST['year'];
        $fechaNacimiento = "$year-$month-$day";
        echo 'id: '.$idUsuario.'<br>';
        echo 'nombreUsuario: '.$nombreUsuario.'<br>';
        echo 'apellido P: '.$apellidoP.'<br>';
        echo 'apellido M: '.$apellidoM.'<br>';
        echo 'password: '.$passwd.'<br>';
        echo 'correo: '.$correo.'<br>';
        echo 'lada: '.$lada.'<br>';
        echo 'telefono: '.$telefono.'<br>';
        echo 'Estado: '.$idEstado.'<br>';
        echo 'talla: '.$idTalla.'<br>';
        echo 'idioma: '.$idIdioma.'<br>';
        echo 'asistencia: '.$asistencia.'<br>';
        echo 'alergias: '.$alergias.'<br>';
        echo 'medicamentos: '.$medicamentos.'<br>';
        //die('');
        
         if (modificarUsuario($nombreUsuario,$apellidoP,$apellidoM,$passwd,$correo,$lada,$telefono,$idUsuario)){
            if(modificarInvitado($idEstado, $talla, $idIdioma, $asistencia, $alergias, $medicamentos,  $fechaNacimiento , $idUsuario)){
                $_SESSION["staffStatusSuccess"] = "Se ha modificado la información exitosamente";
                unset($_SESSION["staffStatusError"]);
            }
        }else{
            $_SESSION["staffStatusError"] = "Hubo un error con la modificación, inténtalo de nuevo más tarde";
            unset($_SESSION["staffStatusSuccess"]);
        }
        if($_SESSION["idRol"]==1492){
            header('location:consulta_de_usuarios.php?eventInput='.$_SESSION["idEvento"]);
        }
         if($_SESSION["idRol"]==1495 || $_SESSION["idRol"]==1496){
            header('location:mi_info.php');
        }
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
    //modificarUsuario($idUsuario,$nombreUsuario,$passwd,$correo,$telefono)
?>