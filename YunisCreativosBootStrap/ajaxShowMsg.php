<?php
    session_start();
    require_once("util.php");    
    
    echo showMsg($_SESSION["idEventoActual"]);

?>