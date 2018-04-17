<?php

    session_start();
    require_once("util.php");
    if ( isset($_SESSION["idRol"]) ){
        unset($_SESSION["errorLogin"]);
        if ($_SESSION["idRol"] == 1492) {           //Director General
            header("location:home_CEO.php");
        }else if ($_SESSION["idRol"] == 1493 ){     //Coordinador
            header("location:home_coordinador.php");
        }else if ($_SESSION["idRol"] == 1494 ){     //Staff
            header("location:home_empleado.php");
        }else if ($_SESSION["idRol"] == 1495 ){     //Invitado
            header("location:home_invitado.php");
        }
    }else if (login($_POST["emailInput"], $_POST["passwd"])) {
        unset($_SESSION["errorLogin"]);
        $_SESSION["mail"] = $_POST["emailInput"];
        $idUser = getUserId($_SESSION["mail"]);
        $_SESSION["name"] = getNombreById($idUser);
        $_SESSION["idRol"] = getRol($idUser);
        // Pa' debugear
        //echo $_SESSION["rol"];
        if ($_SESSION["idRol"] == 1492) {           //Director General
            header("location:home_CEO.php");
        }else if ($_SESSION["idRol"] == 1493 ){     //Coordinador
            header("location:home_coordinador.php");
        }else if ($_SESSION["idRol"] == 1494 ){     //Staff
            header("location:home_empleado.php");
        }else if ($_SESSION["idRol"] == 1495 ){     //Invitado
            header("location:home_invitado.php");
        }

    }else{
        $_SESSION["errorLogin"] = "El correo y/o la contraseña no coinciden";
        header("location:index.php");
    }
    
    
?>