<?php 
     session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
        include("partial/_head.html");
        if($_SESSION["idRol"]== 1492){
            include("partial/_navbarCEO.html");
        }
        else if($_SESSION["idRol"]== 1493){
            include("partial/_navbarCoordinador.html");
        }
         else if($_SESSION["idRol"]== 1494){
            include("partial/_navbarEmpleado.html");
        }
        else{
        include("partial/_navbarInvitado.html");
        }
        include("partial/_foro_invitado.html");
        include("partial/_scripts.html");
        include("partial/_footer.html"); 
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>
