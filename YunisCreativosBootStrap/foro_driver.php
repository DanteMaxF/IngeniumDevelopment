<?php
    session_start();
    require_once("util.php");
    unset($_SESSION["idEventoActual"]);
    
    if ( isset($_SESSION["idRol"]) ){
        echo $_POST["eventInput"];
        $_SESSION["idEventoActual"] = $_POST["eventInput"];
        $_SESSION["descripcionEventoActual"] = getDescripcionEvento($_SESSION["idEventoActual"]);
        header("location:foro_invitado.php");
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }

?>