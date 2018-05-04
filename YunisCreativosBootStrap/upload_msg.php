<?php

    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
        if($_POST['msg']){
            $msg = $_POST['msg'];
            uploadMsg($_SESSION['idUser'], $_SESSION["idEventoActual"], $msg);
        }
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>