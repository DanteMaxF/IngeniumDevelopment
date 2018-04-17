<?php
    session_start();
    require_once("util.php");
    $nombrePlantilla = $_POST["nombrePlantilla"];
    $colorTexto = $_POST["colorTexto"];
    $colorFondo = $_POST["colorFondo"];
    $colorBotones = $_POST["colorBotones"];
    $imagenFondo = $_POST["imagenFondo"];
    
    //Debugging...
    echo "<br>nombrePlantilla: $nombrePlantilla";
    echo "<br>colorTexto: $colorTexto";
    echo "<br>colorFondo: $colorFondo";
    echo "<br>colorBotones: $colorBotones";
    echo "<br>imagenFondo: $imagenFondo";
    
    //registrarPlantillas($nombrePlantilla,$colorTexto,$colorFondo,$colorBotones,$imagenFondo);
    //$_SESSION["message"] = 'Los plantilla ha sido registrada';
    //header("location:plantillas.php");
?>