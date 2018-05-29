<?php 
    session_start();
    require_once("util.php");
    if( isset($_SESSION["codigo"]) ){
        $_SESSION["idEvento"] = getIdEventoByCodigo($_SESSION["codigo"]);
        
        
        include("partial/_head.html"); 
        include("partial/_navbarLogOut.html"); 
        include("partial/_registro_invitado.html");
        include("partial/_scripts.html"); 
        include("partial/_footer.html");
    }else{
        $_SESSION["errorLogin"] = "Es necesario insertar un código de evento";
        header("location:index.php");
    }
?>
