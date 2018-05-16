<?php 
    session_start();
    if( isset($_SESSION["mail"]) ){
        header("location: role_driver.php");
    }else{
        include("partial/_head.html");
        include("partial/_errorLogin.html");
        include("partial/_navbarLogOut.html");
        include("partial/_contrasena.html");
        include("partial/_scripts.html");
        include("partial/_footer.html"); 
        session_start();
    session_unset();
    session_destroy();
    }
   
 
?>
