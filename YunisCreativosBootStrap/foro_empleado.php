<?php 
    session_start();
    require_once("util.php");
    $_SESSION["fEmepleado"] = 3;
    if( isset($_SESSION["idRol"]) && ( $_SESSION["idRol"]==1492 || $_SESSION["idRol"]==1493 || $_SESSION["idRol"]==1494 ) ){
        include("partial/_head.html");
         if($_SESSION["idRol"]== 1492){
            include("partial/_navbarCEO.html");
        }
        else if($_SESSION["idRol"]== 1493){
            include("partial/_navbarCoordinador.html");
        }
         else{
            include("partial/_navbarEmpleado.html");
        }
        include("partial/_foro_empleado.html");
        include("partial/_scripts.html");
        include("partial/_footer.html"); 
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>