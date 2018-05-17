<?php 
    session_start();
    require_once("util.php");
    $nombreUsuario = $_POST["nombreUsuario"];
    $fechaNacimiento = $_POST["fechaNacimiento"]; //invitado
    $apellidoP = $_POST["apellidoP"];
    $apellidoM = $_POST["apellidoM"];
    $idEstado = $_POST["Estado"];               //invitado
    $talla = $_POST["talla"];                   //inv
    $idioma = $_POST["idioma"];  
    $lada = $_POST["lada"];
    $telefono = $_POST["telefono"];             
    $correo = $_POST["correo"];
    $passwd1 =  $_POST["passwd1"];
    $passwd2 =  $_POST["passwd2"];
    $asistencia = $_POST["asistencia"];         
    $alergias = $_POST["alergias"];  //inv
    $idEvento = $_POST["idEvento"];
    $medicamentos = $_POST["medicamentos"];
    
    
    if (registrarUsuario($nombreUsuario,$apellidoP,$apellidoM,$passwd1,$correo,$lada,$telefono)){
         $_SESSION["staffStatusSuccess"] = "Se ha registrado la información exitosamente";
                unset($_SESSION["staffStatusError"]);
                header('location: registrarInvitadoEvento.php?correo='.$correo.'&fechaNacimiento='.$fechaNacimiento.'&idEstado='.$idEstado.'&talla='.$talla.'&idioma='.$idioma.'&alergias='.$alergias.'&asistencia='.$asistencia.'&idEvento='.$idEvento.'&medicamentos='.$medicamentos);
    }else{
            $_SESSION["staffStatusError"] = "Hubo un error con el regitro, inténtalo de nuevo más tarde";
            unset($_SESSION["staffStatusSuccess"]);
    }     
   
    
    
    
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
    echo "<br>medicamentos: $medicamentos";
     
    
    
    //registrarUsuario($nombreUsuario,$passwd,$correo,$telefono);
    //registrarInvitado($idInvitado,$correo,$fechaNacimiento,$talla,$idEstado);
    //$_SESSION["message"] = 'Los datos han sido guardados';
    //header("location:index.php");
?>