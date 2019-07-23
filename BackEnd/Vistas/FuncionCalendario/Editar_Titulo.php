<?php
// Conexion a la base de datos
require_once('../../Modelo/Conexion.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM vacaciones WHERE IdVacaciones = $id";
	$query = $pdo->prepare( $sql );
	if ($query == false) {
	 print_r($pdo->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}elseif (isset($_POST['Titulo']) && isset($_POST['Color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$Titulo = $_POST['Titulo'];
	$Color = $_POST['Color'];
	
	$sql = "UPDATE vacaciones SET  Titulo = '$Titulo', Color = '$Color' WHERE IdVacaciones = $id ";

	
	$query = $pdo->prepare( $sql );
	if ($query == false) {
	 print_r($pdo->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: ../Calendario.php');

	
?>
