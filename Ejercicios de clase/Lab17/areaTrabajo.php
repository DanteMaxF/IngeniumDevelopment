<?php
    session_start();
    require_once("util.php");
    
    if(isset($_SESSION["Id_AreaTrabajo"]) ) {
        $area = $_SESSION["area"];
        $_SESSION["area"] = getArea($Id_AreaTrabajo,'Area');
        $Id_Usuario = $_SESSION["usuario"];
        $_SESSION["Id_Usuario"] = getArea($Id_Usuario);
        $Id_Usuario = $_SESSION["usuario"];
        include("partials/header.html");
        include("partials/navbar.html");
        
        include("partials/miCuenta.html");
        
        include("partials/scripts.html");
        include("partials/footer.html");
    }else{
        $_SESSION["error"] = "No hay Rol";
        header("location: inicio_sesion.php");
    }
?>