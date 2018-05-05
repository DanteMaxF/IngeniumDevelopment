<?php
    session_start();
    require_once("util.php");    
    
   
    
    
    if(isset($_SESSION["fEmepleado"])){
             echo showMsg($_SESSION["fEmepleado"]);
        }else{
             echo showMsg($_SESSION["idEventoActual"]);
    
        }

?>