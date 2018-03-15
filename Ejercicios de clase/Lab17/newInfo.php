<?php
    session_start();
    require_once("util.php");
    
    if(isset($_SESSION["user"]) ) {
        updatePersonalInfo($_POST["username"],$_POST["apellido"],$_POST["cumple"],$_POST["passwd"],$user);
        header("location: index.php");
        
    }else{
        $_SESSION["error"] = "Tienes que iniciar sesión";
        header("location: inicio_sesion.php");
    }
?>