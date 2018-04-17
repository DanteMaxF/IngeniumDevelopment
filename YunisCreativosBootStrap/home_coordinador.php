<?php 
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){

        include("partial/_navbarCoordinador.html");
        require("FullCalendar/index.php");
        include ("partial/_footer.html");
        include("partial/_footer.html");
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>