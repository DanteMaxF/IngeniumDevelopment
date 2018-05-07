<?php

    session_start();
    require_once("util.php");
    echo codigoEvento($_POST["codigo"]);
    
    if (codigoEvento($_POST["codigo"])) {
        unset($_SESSION["errorLogin"]);
        $_SESSION["codigo"] = $_POST["codigo"];
        header("location:registro_invitado.php");
        

    }else{
        $_SESSION["errorLogin"] = "El código no existeo ha caducado";
        header("location:index.php");
    }
    
?>