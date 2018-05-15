<?php
   session_start();
    require_once("util.php");

    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"] ==1494){

        include("partial/_head.html");
        
        $_SESSION["idEventoActual"] = getLastEventoStaff($_SESSION["idUser"]);
        $_SESSION["idEvento"] = $_SESSION["idEventoActual"];
        if( $_SESSION["idEventoActual"]== -1){
            $_SESSION["descripcionEventoActual"] = "AUN NO SE TE HA ASIGNADO UN EVENTO :(";
            include("partial/_navbarEmpleadoNull.html");
        }else{
            $_SESSION["descripcionEventoActual"] = getDescripcionEvento($_SESSION["idEventoActual"]);
            include("partial/_navbarEmpleado.html");
        }
        
        require("FullCalendar/index.php");
        include("partial/_googlemaps.html");
        include("partial/_scripts.html");
        include ("partial/_footer.html");



    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }

?>
