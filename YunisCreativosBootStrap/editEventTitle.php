<?php

require_once('bdd.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	$id = $_POST['id'];
	
	$sql = "DELETE FROM events WHERE id = $id";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error al preparar');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Error al ejecutar');
	}
	
}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	
	$sql = "UPDATE events SET  title = '$title', color = '$color' WHERE id = $id ";

	// Evitar errores de "sintaxis" al enviarlos al servidor e inicializar recursos
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error al preparar');
	}
     // Vincula los valores de los parámetros y los envía al servidor a guardarlos en los recursos
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error al ejecutar');
	}

}
header('Location: role_driver.php');

	
?>
