<?php
    session_start();
    require_once("util.php");
    
    if(isset($_SESSION["user"]) ) {
        $user = $_SESSION["user"];
        $_SESSION["username"] = getFromUser($user,'Nombre');
        $username = $_SESSION["username"];
        $_SESSION["userRol"] = getRol($user);
        $userRol = $_SESSION["userRol"];
        include("partials/header.html");
        include("partials/navbar.html");
        
        include("partials/miCuenta.html");
        
        include("partials/scripts.html");
        include("partials/footer.html");
    }else{
        $_SESSION["error"] = "Tienes que iniciar sesión";
        header("location: inicio_sesion.php");
    }
?>