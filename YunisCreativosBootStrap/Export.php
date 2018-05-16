<?php

    session_start();
require_once("util.php");
    if(isset($_SESSION["idRol"]) && $_SESSION["idRol"] ==1492 ){


        if(isset($_POST["Export"])) {
   
        $_SESSION["AuxEx"] = getInvitadosExcel3($_SESSION["idEvento"]);
  
       
     header('Content-Type: application/xls; charset=utf-8');
     header('Content-Disposition: attachment; filename=Invitados.xls');
   
        
    }else{
        
    echo "Error , Favor de Consultar al Administrador.";
    }
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
    
    
  ?>