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

.imagen-plantilla{
    height: 100%;
    width: auto;
    
}

.image-container{
    position: relative;
    height: 72vh;
    width: 100%;
    margin-top: -99px;
    margin-bottom: -99px;
    padding: 8px 0;
    display: flex;
}

.image-container .imagen-plantilla{
    margin: 0 auto;
}

.image-container::before{
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    background: rgba(0, 0, 0, 0.2);
}

@media only screen and (min-width: 992px) {
    .image-container{
        margin-top: -26px;
        margin-bottom: -26px;
    }

}



