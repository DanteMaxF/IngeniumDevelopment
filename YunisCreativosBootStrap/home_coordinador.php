<?php 
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"]==1493 ){
        
        include("partial/_head.html");
        
        $_SESSION["idEventoActual"] = getLastEventoCoordinador($_SESSION["idUser"]);
        $_SESSION["idEvento"] = $_SESSION["idEventoActual"];
        if( $_SESSION["idEventoActual"]== -1){
            $_SESSION["descripcionEventoActual"] = "AUN NO SE TE HA ASIGNADO UN EVENTO :(";
            include("partial/_navbarCoordinadorNull.html");
        }else{
            $_SESSION["descripcionEventoActual"] = getDescripcionEvento($_SESSION["idEventoActual"]);
            include("partial/_navbarCoordinador.html");
        }
        
        
        echo '<h3 class=text-center>'.$_SESSION["descripcionEventoActual"].'</h3>';
        include("partial/_FullCalendar.html");
        include("partial/_scripts.html");
        include("partial/_googlemaps.html");
        include ("partial/_footer.html");
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>
