<?php

	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once '../../Modelo/Conexion.php';
		
		$IdViatico = $_POST['delete'];		

		$sql = "DELETE FROM viaticos WHERE IdViatico=:IdViatico";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(':IdViatico'=>$IdViatico));
		
		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Eliminado con éxito ...';    
			      
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede eliminar ...';
		}
		echo json_encode($response);
	}