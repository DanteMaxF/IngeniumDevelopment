<?php
// Conexión a la base de datos y al archivo para recorrer los eventos
require_once('bdd.php');
require_once('moveEvent.php');

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	// Obtener los datos del nuevo evento del formulario 
    $title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	// Añadirlos a la base de datos como un nuevo evento
    $sql = "INSERT INTO events(title, start, end, color) values ('$title', '$start', '$end', '$color')";
	echo $sql;
    
	// Evitar errores de "sintaxis" al enviarlos al servidor e inicializar recursos
	$query = $bdd->prepare( $sql );
	if ($query == false){
	 print_r($bdd->errorInfo());
	 die ('Error al preparar');
	}
    
    // Vincula los valores de los parámetros y los envía al servidor a guardarlos en los recursos
	$sth = $query->execute();
	if ($sth == false){
	 print_r($query->errorInfo());
	 die ('Error al ejecutar');
	}

    // Llamar a función para recorrer los eventos
    moveEvents($start,$end);
}
header('Location: '.$_SERVER['HTTP_REFERER']);
?>
