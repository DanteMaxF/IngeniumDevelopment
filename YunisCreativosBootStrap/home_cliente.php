<?php
    
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"]==1496){
        include("partial/_head.html");
        
        $_SESSION["idEventoActual"] = getLastEventInvitado($_SESSION["idUser"]);
        if( $_SESSION["idEventoActual"]== -1){
            $_SESSION["descripcionEventoActual"] = "AUN NO SE TE HA ASIGNADO UN EVENTO :(";
            include("partial/_navbarInvitadoNull.html");
        }else{
            $_SESSION["descripcionEventoActual"] = getDescripcionEvento($_SESSION["idEventoActual"]);
            include("partial/_navbarCliente.html");
        }
        
        include("partial/_home_invitado.html");
        include("partial/_scripts.html");
        include("partial/_footer.html");
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
    
?> 