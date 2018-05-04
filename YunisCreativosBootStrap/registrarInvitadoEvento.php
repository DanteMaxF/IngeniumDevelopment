<?php
    require_once("util.php");
    
    $userId = getIDUserByMail($_GET['correo']);
    $fechaNacimiento = $_GET["fechaNacimiento"]; 
    $idEstado = $_GET["idEstado"];               
    $talla = $_GET["talla"];                   
    $idioma = $_GET["idioma"];  
    $alergias = $_GET["alergias"];
    $asistencia = $_GET['asistencia'];
    $idEvento = $_GET["idEvento"];
    $medicamentos = $_GET["medicamentos"];
    
    
    if(registrarInvitado($userId,$fechaNacimiento,$talla,$idEstado,$idioma,$alergias,$medicamentos) && registrarRol($userId,1495) && registrarUsuarioEvento($idEvento,$userId)){
        header("location: index.php?success=1");
    }else{
        echo "ERROR";
    }
    
    
    //debugging...
    echo "<br>";
    echo 'User id: '.$idEvento;
    echo "<br>";
    echo 'User id: '.$userId;
    echo "<br>";
    echo 'fechaNacimiento: '.$fechaNacimiento;
    echo "<br>";
    echo 'idEstado: '.$idEstado;
    echo "<br>";
    echo 'talla: '.$talla;
    echo "<br>";
    echo 'idioma: '.$idioma;
    echo "<br>";
    echo 'alergias: '.$alergias;
    echo "<br>";
    echo 'asistencia: '.$asistencia;
    echo "<br>";
    echo 'medicamentos: '.$medicamentos;

?>