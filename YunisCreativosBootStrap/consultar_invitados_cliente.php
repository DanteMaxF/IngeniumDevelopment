<?php

    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"]==1496){
        
        include("partial/_head_invitado.html");
        include("partial/_navbarCliente.html");
        include("partial/_consulta_invitados_cliente.html");
        include("partial/_scripts.html");
        include("partial/_footer.html");
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }

?>