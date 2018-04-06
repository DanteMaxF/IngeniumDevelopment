<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
        include("partial/_head.html");
        include("partial/_navbarCEO.html");
        include("partial/_forma_consultar_usuario.html");
         
        if ((($_GET["eventInput"] != "" && $_GET["eventInput"] != "-") || isset($_SESSION["descripcionRol"])) || (($_GET["rolInput"] != "" && $_GET["rolInput"] != "-") || isset($_SESSION["descripcionRol"]))){
            $_SESSION["evento"] =  $_GET["eventInput"];
            $_SESSION["idEvento"] = getIdEvento($_SESSION["evento"]);
            $_SESSION["rol"] =  $_GET["rolInput"];
            $_SESSION["rolID"] = getIdEvento($_SESSION["rol"]);
            include("partial/_consulta_de_usuarios.html");
        
        
        include("partial/_consulta_de_usuarios.html");
        include("partial/_footer.html");
        include("partial/_scripts.html");
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>