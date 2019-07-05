<?php

	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once '../../Modelo/Conexion.php';
		
		$IdPermiso = $_POST['delete'];
		
		$sql = "DELETE FROM permisos WHERE IdPermiso=:IdPermiso";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(':IdPermiso'=>$IdPermiso));
		
		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Eliminado con éxito ...';    
			      
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede eliminar ...';
		}
		echo json_encode($response);
	}