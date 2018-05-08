<?php
    require_once("util.php");
    
    $idInvitado = getIDUserByMail($_GET['correo']);
    $rol = $_GET["rol"];
    $fechaNacimiento = $_GET["fechaNacimiento"];
    $idEstado = $_GET["Estado"];
    $talla = $_GET["talla"];
    $idIdioma = $_GET["idioma"];
    $alergias = $_GET["alergias"];
    $medicamentos = $_GET["medicamentos"];
    

     if (registrarRol($userId,$rol)){
            if(($rol == 1496) || ($rol ==1495)){
                if(registrarInvitado($idInvitado,$fechaNacimiento, $talla, $idEstado, $idIdioma,$alergias,$medicamentos)){
                    header("location: registro_usuario.php?success=1");
                }
            }
    }else{
        echo "ERROR";
    }
    
  
   /* 
    //debugging...
    echo "<br> fecha nacimeinto: $fechaNacimiento";
    echo "<br> estado: $idEstado";
    echo "<br> talla: $talla";
    echo "<br> idioma: $idIdioma";
    echo "<br> alergias: $alergias";
    echo "<br> medicamentos: $mediacamentos";
    echo "<br> rol: $rol";
    */
?>