<?php
    require_once("util.php");
    
    $idPlantilla = $_GET["idPlantilla"];
    $codigoEvento = $_GET["codigoEvento"];
    $idEvento = getIdEventoByCodigo($codigoEvento);
    echo $idPlantilla;
    echo $codigoEvento;
    
    
    if(registrarEventoPlantilla($idPlantilla, $idEvento)){
        echo '<script>
                    alert("Hello! I am an alert box!");
              </script>';
        header('location: home_CEO.php');
    }

?>