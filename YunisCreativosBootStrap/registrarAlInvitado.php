<?php 
    session_start();
    require_once("util.php");
    $nombreUsuario = $_POST["nombreUsuario"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $idEstado = $_POST["Estado"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    
    $passwd1 =  $_POST["passwd1"];
    $passwd2 =  $_POST["passwd2"];
    
    $talla = $_POST["talla"];
    $asistenciaSi = $_POST["asistenciaSi"];
    $asistenciaNo = $_POST["asistenciaNo"];
    $idioma = $_POST["idioma"];
    
    
    //Debugging...
    echo "<br>nombreUsuario: $nombreUsuario";
    echo "<br>fechaNacimiento: $fechaNacimiento";
    echo "<br>idEstado: $idEstado";
    echo "<br>correo: $correo";
    echo "<br>telefono: $telefono";
    
    echo "<br>passwd1: $passwd1";
    echo "<br>passwd2: $passwd2";
    echo "<br>talla: $talla";
    echo "<br>Asistencia SI: $asistenciaSi";
    echo "<br>Asistencia NO: $asistenciaNo";
    echo "<br>Idioma: $idioma";
    if ($idioma != ""){
      echo "<br>IDIOMA SELECCIONADO";  
    }else{
        echo "<br>NO IDIOMA";
    }
     
    
    
    //registrarUsuario($nombreUsuario,$passwd,$correo,$telefono);
    //registrarInvitado($idInvitado,$correo,$fechaNacimiento,$talla,$idEstado);
    //$_SESSION["message"] = 'Los datos han sido guardados';
    //header("location:index.php");
?>