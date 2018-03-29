<?php 
    session_start();
    require_once("util.php");
    $nombreUsuario = $_POST["nombreUsuario"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $idEstado = $_POST["Estado"];
    $talla = $_POST["talla"];
    $idioma = $_POST["idioma"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $passwd1 =  $_POST["passwd1"];
    $passwd2 =  $_POST["passwd2"];

    $asistencia = $_POST["asistencia"];
    $alergias = $_POST["alergias"];
    
    
    
    
    //Debugging...
    echo "<br>nombreUsuario: $nombreUsuario";
    echo "<br>fechaNacimiento: $fechaNacimiento";
    echo "<br>idEstado: $idEstado";
    echo "<br>correo: $correo";
    echo "<br>telefono: $telefono";
    echo "<br>passwd1: $passwd1";
    echo "<br>passwd2: $passwd2";
    echo "<br>talla: $talla";
    echo "<br>Asistencia: $asistencia";
    echo "<br>Idioma: $idioma";
    echo "<br>alergias: $alergias";
     
    
    
    //registrarUsuario($nombreUsuario,$passwd,$correo,$telefono);
    //registrarInvitado($idInvitado,$correo,$fechaNacimiento,$talla,$idEstado);
    //$_SESSION["message"] = 'Los datos han sido guardados';
    //header("location:index.php");
?>