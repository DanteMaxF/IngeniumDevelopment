<?php
    session_start();
    require_once("util.php");
    unset($_SESSION["evento"]);
    unset($_SESSION["idEvento"]);
    
    if ( isset($_SESSION["idRol"]) ){
        include("partial/_head.html");
        include("partial/_navbarCEO.html");
        include("partial/_menuForo.html");
        include("partial/_footer.html");
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }

?>