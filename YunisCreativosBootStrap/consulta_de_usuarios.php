<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
        include("partial/_head.html");
        include("partial/_navbarCEO.html");
        include("partial/_consulta_de_usuarios.html");
        include("partial/_footer.html");
        include("partial/_scripts.html");
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>