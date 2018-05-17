<?php
    
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"]==1496){
        include("partial/_head_invitado.html");
        
        $_SESSION["idEventoActual"] = getLastEventCliente($_SESSION["idUser"]);
        $_SESSION["idEvento"] = $_SESSION["idEventoActual"];
        echo $_SESSION["idEventoActual"];
        if( $_SESSION["idEventoActual"]== -1){
            $_SESSION["descripcionEventoActual"] = "AUN NO SE TE HA ASIGNADO UN EVENTO :(";
            include("partial/_navbarInvitadoNull.html");
        }else{
            $_SESSION["descripcionEventoActual"] = getDescripcionEvento($_SESSION["idEventoActual"]);
            include("partial/_navbarCliente.html");
        }
        echo $_SESSION["descripcionEventoActual"];
        include("partial/_home_invitado.html");
        include("partial/_scripts.html");
        include("partial/_googlemaps.html");
        include("partial/_footer.html");
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
    
?> 