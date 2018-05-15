<?php
   session_start();
    require_once("util.php");

    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"] ==1494){

        include("partial/_head.html");
        include("partial/_navbarEmpleado.html");
        require("FullCalendar/index.php");
        include("partial/_googlemaps.html");
        include ("partial/_footer.html");



    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }

?>
