<?php 
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"] ==1492){
        include("partial/_head.html"); 
        include("partial/_navbarCEO.html"); 
        include("partial/_registro_usuario.html"); 
        include("partial/_scripts.html"); 
        include("partial/_footer.html"); 
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>
