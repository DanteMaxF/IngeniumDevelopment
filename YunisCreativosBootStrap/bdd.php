<?php

$developerMode = true;

try{
    if($developerMode){
        $bdd = new PDO('mysql:host=localhost;dbname=YunisCreativos;charset=utf8', 'root', '');
    }else{
        $bdd = new PDO('mysql:host=localhost;dbname=YunisCreativos;charset=utf8', 'DanteMaxF', 'Ingenium123');    
    }
	
}
catch(Exception $e){
        die('Error : '.$e->getMessage());
}

