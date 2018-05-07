<?php


    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"]==1496){
        include("partial/_head.html");
        include("partial/_navbar.html"); 
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }


?>