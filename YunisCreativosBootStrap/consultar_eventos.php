<?php 
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
        include("partial/_head.html");
        include("partial/_navbarCEO.html"); 
        include("partial/_forma_consultar_eventos.html");
        if ($_POST["eventInput"] != "" && $_POST["eventInput"] != "-"){
            $evento =  $_POST["eventInput"];
            include("partial/_consultar_eventos.html"); 
        }
        include("partial/_scripts.html");
        include("partial/_footer.html"); 
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>

