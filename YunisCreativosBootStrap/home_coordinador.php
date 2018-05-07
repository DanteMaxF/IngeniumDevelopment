<?php 
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"]==1493 ){
        $_SESSION["idEventoActual"] = getLastEventoCoordinador($_SESSION["idUser"]);
        $_SESSION["descripcionEventoActual"] = getDescripcionEvento($_SESSION["idEventoActual"]);
        echo $_SESSION["descripcionEventoActual"];
        include("partial/_head.html");
        include("partial/_navbarCoordinador.html");
        include("partial/_FullCalendar.html");
        include("partial/_scripts.html");
        include ("partial/_footer.html");
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>
