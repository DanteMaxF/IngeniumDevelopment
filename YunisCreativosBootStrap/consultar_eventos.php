<?php 
    session_start();
   require_once("util.php");
  
    unset($_SESSION["evento"]);
    unset($_SESSION["idEvento"]);
    if(  isset($_SESSION["idRol"]) && $_SESSION["idRol"] ==1492 ){
        
        include("partial/_statusRegistroEliminarStaff.html");
        unset($_SESSION["staffStatusError"]);
        unset($_SESSION["staffStatusSuccess"]);
        
        include("partial/_head.html");
        include("partial/_navbarCEO.html"); 
        include("partial/_forma_consultar_eventos.html");
        if($_GET["eventInput"] == "-"){
            unset($_SESSION["evento"]);
            unset($_SESSION["idEvento"]);
        }
        else if (($_GET["eventInput"] != "" && $_GET["eventInput"] != "-") || isset($_SESSION["idEvento"])){
            
            $_SESSION["idEvento"] =  $_GET["eventInput"];
            $_SESSION["evento"] = getDescripcionEvento($_SESSION["idEvento"]);
            echo '<h1 class="text-center">'.$_SESSION["evento"].'</h1>';
            require_once('bdd.php');
           
        

            $sql = 'SELECT id, title, start, end, color FROM events WHERE idEvento = "'.$_SESSION["idEvento"].'"';
            $req = $bdd->prepare($sql);
            $req->execute();
            $events = $req->fetchAll();
            setID($_SESSION["idEvento"] );
           
            include("partial/_FullCalendar.html");
           
   

            include("partial/_consultar_eventos.html"); 
          

        }
         
      //  include("partial/_scripts.html");
        include("partial/_footer.html"); 
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
 
  
?>


