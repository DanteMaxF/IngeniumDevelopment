<?php 
 
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
        $_SESSION["idEventoActual"] = getLastEvent($_SESSION["idUser"]);
        $_SESSION["descripcionEventoActual"] = getDescripcionEvento($_SESSION["idEventoActual"]);
        
        include("partial/_head.html");
        include("partial/_navbarInvitado.html"); 
        include("partial/_home_invitado.html");
        include("partial/_scripts.html");
        include("partial/_footer.html"); 

    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>








