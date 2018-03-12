<?php
    session_start();
    require_once("util.php");
    
    if(isset($_SESSION["user"]) ) {
        $user = $_SESSION["user"];
        $_SESSION["username"] = getFromUser($user,'Nombre');
        $username = $_SESSION["username"];
        $_SESSION["apellido"] = getFromUser($user,'Apellidos');
        $apellido = $_SESSION["apellido"];
        $_SESSION["cumple"] = getFromUser($user,'Fecha_Nacimiento');
        $passwd = $_SESSION["cumple"];
        $_SESSION["passwd"] = getFromUser($user,'Contrasena');
        $passwd = $_SESSION["passwd"];
        
        $_SESSION["userRol"] = getRol($user);
        $userRol = $_SESSION["userRol"];
        include("partials/header.html");
        include("partials/navbar.html");
        
        include("partials/modificarInfoPer.html");
        
        include("partials/scripts.html");
        include("partials/footer.html");
    }else{
        $_SESSION["error"] = "Tienes que iniciar sesión";
        header("location: inicio_sesion.php");
    }
?>