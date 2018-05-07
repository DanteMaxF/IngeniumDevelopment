<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"] ==1492){
        $idPlantilla = $_GET["idPlantilla"];
        $codigoEvento = $_GET["codigoEvento"];
        $idEvento = getIdEventoByCodigo($codigoEvento);
        echo $idPlantilla;
        echo $codigoEvento;
        
        
        if(registrarEventoPlantilla($idPlantilla, $idEvento)){
            echo '<script>
                        alert("Hello! I am an alert box!");
                  </script>';
            header('location: home_CEO.php');
        }
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }

?>