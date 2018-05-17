<?php 
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"] ==1492){
        $nombreEvento = $_POST["nombreEvento"];
        $descripcionEvento = $_POST["descripcionEvento"];
        $idEncuesta = 1; //ESTO SE MODIFICARA CUANDO SE TRABAJE CON LA ENCUESTA!!!!!!!!
        $idCliente = $_POST["idCliente"];
        $idCoordinador = $_POST["idCoordinador"];
        $codigoEvento = $_POST["codigoEvento"];
        $idPlantilla = $_POST["idPlantilla"];
        
        //Debugging...
        echo "<br>Nombre Evento: $nombreEvento";
        echo "<br>Descripcion Evento: $descripcionEvento";
        echo "<br>id Encuesta: $idEncuesta";
        echo "<br>id Cliente: $idCliente";
        echo "<br>id Coordinador: $idCoordinador";
        echo "<br>Codigo Evento: $codigoEvento";
        echo "<br>id Plantilla: $idPlantilla";
        
        
        if (registrarEvento($nombreEvento, $descripcionEvento, $idCliente, $idCoordinador, $codigoEvento, $idPlantilla)){
            header('location: home_CEO.php');
        }
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
    
?>