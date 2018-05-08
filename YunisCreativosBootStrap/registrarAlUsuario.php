<?php 
    session_start();
    require_once("util.php");
    $nombreUsuario = $_POST["nombreUsuario"];
    $passwd1 =  $_POST["passwd1"];
    $passwd2 =  $_POST["passwd2"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $rol = $_POST["rol"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $Estado = $_POST["Estado"];
    $talla = $_POST["talla"];
    $idioma = $_POST["idioma"];
    $alergias = $_POST["alergias"];
    $mediacamentos = $_POST["medicamentos"];

    if(registrarUsuario($nombreUsuario,$passwd1,$correo,$telefono)){
         header('location:registrarUsuarioEvento.php?rol='.$rol.'&correo='.$correo.'&fechaNacimiento='.$fechaNacimiento.'&Estado='.$Estado.'&talla='.$talla.'&idioma='.$idioma.'&alergias='.$alergias.'&medicamentos='.$mediacamentos);
    }else{
        echo "Error";
    }
    //$_SESSION["message"] = 'Los datos han sido guardados';
    //header("location:index.php");

/*    
    //Debugging...
    echo "<br>nombreUsuario: $nombreUsuario";
    echo "<br>passwd1: $passwd1";
    echo "<br>passwd2: $passwd2";
    echo "<br>correo: $correo";
    echo "<br>telefono: $telefono";
    echo "<br>rol: $rol";
    echo "<br> fecha nacimeinto: $fechaNacimiento";
    echo "<br> estado: $Estado";
    echo "<br> talla: $talla";
    echo "<br> idioma: $idioma";
    echo "<br> alergias: $alergias";
    echo "<br> medicamentos: $mediacamentos";
*/
 //header('location:registrarUsuarioEvento.php?rol='.$rol.'&correo='.$correo.'&fechaNacimiento='.$fechaNacimiento.'&Estado='.$Estado.'&talla='.$talla.'&idioma='.$idioma.'&alergias='.$alergias.'&medicamentos='.$mediacamentos);
?>
