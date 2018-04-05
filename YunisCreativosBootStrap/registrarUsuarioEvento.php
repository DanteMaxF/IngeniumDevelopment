<?php
    require_once("util.php");
    
    $userId = getIDUserByMail($_GET['correo']);
    $rol = $_GET["rol"];
    
    
    if (registrarRol($userId,$rol)){
        header("location: index.php?success=1");
    }else{
        echo "ERROR";
    }
    
    
    //debugging...
    echo "<br>";
    echo 'User id: '.$userId;
    echo "<br>";
    echo 'rol: '.$rol;
   
?>