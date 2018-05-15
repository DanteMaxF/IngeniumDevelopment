<?php
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) && ($_SESSION["idRol"]==1492) ){
        $idDiseno = $_POST["idDiseno"];
        $nombrePlantilla = $_POST["nombrePlantilla"];
        $colorFondo = $_POST["colorFondo"];
        $colorTexto = $_POST["colorTexto"];
        $nombreImagen = basename($_FILES["nombreImagen"]["name"]);
        
        echo 'id Diseno: '.$idDiseno.'<br>';
        echo 'nombre Plantilla: '.$nombrePlantilla.'<br>';
        echo 'color fondo: '.$colorFondo.'<br>';
        echo 'color texto: '.$colorTexto.'<br>';
        echo 'nombre Imagen: '.$nombreImagen.'<br>';
        //die('');
        
    }
    //modificarUsuario($idUsuario,$nombreUsuario,$passwd,$correo,$telefono)
?>