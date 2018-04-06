<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
        include("partial/_head.html");
        include("partial/_navbarCEO.html");
         include("partial/_forma_consultar_usuario.html");
        if($_GET["eventInput"] == "-" && $_GET["rolInput"] == "-"){
            unset($_SESSION["evento"]);
            unset($_SESSION["idEvento"]);
            unset($_SESSION["rol"]);
        }
        
        
        include("partial/_consulta_de_usuarios.html");
        include("partial/_footer.html");
        include("partial/_scripts.html");
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>