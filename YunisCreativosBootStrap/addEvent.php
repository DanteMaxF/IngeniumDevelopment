<?php

require_once('bdd.php');
require_once('util.php');




if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){

    $title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$eventid =   getIDactividad();

	
    $sql = "INSERT INTO events(title, start, end, color,idEvento) values ('$title', '$start', '$end', '$color', '$eventid')";
	echo $sql;
    $query = $bdd->prepare( $sql );
	if ($query == false){
	 print_r($bdd->errorInfo());
	 die ('Error al preparar');
	}
    
   
	$sth = $query->execute();
	if ($sth == false){
	 print_r($query->errorInfo());
	 die ('Error al ejecutar');
	}


}
header('Location: '.$_SERVER['HTTP_REFERER']);
?>
