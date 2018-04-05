<?php 
    session_start();
    require_once("util.php");
    $nombreUsuario = $_POST["nombreUsuario"];
    $passwd1 =  $_POST["passwd1"];
    $passwd2 =  $_POST["passwd2"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $rol = $_POST["rol"];
    
    
    
    if(registrarUsuario($nombreUsuario,$passwd1,$correo,$telefono)){
         header('location:registrarUsuarioEvento.php?rol='.$rol.'&correo='.$correo);
    }else{
        echo "Error";
    }
    //$_SESSION["message"] = 'Los datos han sido guardados';
    //header("location:index.php");
    
     
    //Debugging...
    echo "<br>nombreUsuario: $nombreUsuario";
    echo "<br>passwd1: $passwd1";
    echo "<br>passwd2: $passwd2";
    echo "<br>correo: $correo";
    echo "<br>telefono: $telefono";
    echo "<br>rol: $rol";
?>
