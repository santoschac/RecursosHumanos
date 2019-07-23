<?php

// Conexion a la base de datos
require_once('../../Modelo/Conexion.php');

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
	$id = $_POST['Event'][0];
	$FechaInicio = $_POST['Event'][1];
	$FechaFin = $_POST['Event'][2];
	$FechaFinal = date("Y-m-d",strtotime($FechaFin."- 1 days"));

	$sql = "UPDATE vacaciones SET  FechaInicio = '$FechaInicio', FechaFinal = '$FechaFinal' WHERE IdVacaciones = $id ";

	
	$query = $pdo->prepare( $sql );
	if ($query == false) {
	 print_r($pdo->errorInfo());
	 die ('Error');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error');
	}else{
		die ('OK');
	}

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
