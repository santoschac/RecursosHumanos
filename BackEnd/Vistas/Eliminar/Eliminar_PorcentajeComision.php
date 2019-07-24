<?php

	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once '../../Modelo/Conexion.php';
		
		$IdComisionPorcentaje = $_POST['delete'];
		$sql = "DELETE FROM comisionporcentaje WHERE IdComisionPorcentaje=:IdComisionPorcentaje";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(':IdComisionPorcentaje'=>$IdComisionPorcentaje));
		
		if ($stmt) {
			$response['status']  = 'success';
            $response['message'] = 'Eliminado con éxito ...';            
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede eliminar ...';
		}
		echo json_encode($response);
	}