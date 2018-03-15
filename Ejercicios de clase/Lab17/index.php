<?php
        session_start();
        require_once("util.php");

        if(isset($_SESSION["user"]) ) {
                header("location: panel_de_control.php");
        }else{
                include("partials/header.html");
                include("partials/navbar.html");
                include("partials/home.html");
                include("partials/scripts.html");
                include("partials/footer.html"); 
        }  
?>
