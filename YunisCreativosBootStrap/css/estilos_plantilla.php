<?php
    header("Content-type: text/css; charset: UTF-8");
    session_start();
    require_once("../util.php");
    if($_SESSION["mail"]){
        $idInvitado = getIDUserByMail($_SESSION["mail"]);
        $idPlantilla =  getIdPlantillaByIdInvitado($idInvitado);
        $plantilla = getPlantillaById($idPlantilla);
    }
?>

.navbar {
   background: <?php echo $plantilla["colorFondo"] ?>!important;
}

.navbar-brand, .nav-item .nav-link{
    color: <?php echo $plantilla["colorTexto"] ?>!important;
}


