<?php

    session_start();
    require_once("util.php");
    
    if( isset($_SESSION["idRol"]) ){
        
        $msg = $_POST['msg'];
        echo $msg;
        uploadMsg($_SESSION['idUser'], $_SESSION["idEventoActual"], $msg);
        
        header("location:foro_invitado.php");
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>