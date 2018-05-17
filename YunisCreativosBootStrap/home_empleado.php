<?php
   session_start();
    require_once("util.php");

    if( isset($_SESSION["idRol"]) && $_SESSION["idRol"] ==1494){
        $_SESSION["idEventoActual"] = getLastEventoCoordinador($_SESSION["idUser"]);
        $_SESSION["descripcionEventoActual"] = getDescripcionEvento($_SESSION["idEventoActual"]);

        include("partial/_head.html");
        include("partial/_navbarEmpleado.html");
        require_once('bdd.php');
        $sql = 'SELECT id, title, start, end, color FROM events WHERE idEvento = "'.$_SESSION["idEventoActual"].'"';
        $req = $bdd->prepare($sql);
        $req->execute();
        $events = $req->fetchAll();
            
        echo '<h1 class="text-center">Evento:  '.$_SESSION["descripcionEventoActual"].'</h1>';  
        include("partial/_Calendario.html");
        include("partial/_googlemaps.html");
        include("partial/_scripts.html");
        include ("partial/_footer.html");
        


    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }

?>
