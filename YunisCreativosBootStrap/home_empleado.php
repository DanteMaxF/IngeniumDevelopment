<?php
   session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
      include("partial/_head.html");
      include("partial/_navbarEmpleado.html"); 
      include("partial/_home_empleado.html");
      include("partial/_scripts.html");
      include("partial/_footer.html"); 
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>
