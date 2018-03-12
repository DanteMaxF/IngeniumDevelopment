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
        include("partials/panelControl.html");
       

        include("partials/footer.html");

    }else if (login($_POST["user"], $_POST["password"]) ) {
        unset($_SESSION["error"]);
        $_SESSION["user"] = $_POST["user"];
        $user = $_SESSION["user"];
        $_SESSION["username"] = getFromUser($user,'Nombre');
        $username = $_SESSION["username"];
        $_SESSION["userRol"] = getRol($user);
        $userRol = $_SESSION["userRol"];

        
        include("partials/header.html");
        include("partials/navbar.html");
        include("partials/panelControl.html");
       
        include("partials/scripts.html");
        include("partials/footer.html");
    }else{
        $_SESSION["error"] = "Usuario y/o contraseña incorrectos";
        header("location: inicio_sesion.php");
    }

?>
