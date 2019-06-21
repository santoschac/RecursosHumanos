<?php

	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once '../../Modelo/Conexion.php';
		
		$IdAsignarJornada = $_POST['delete'];
		$sql = "DELETE FROM asignarjornada WHERE IdAsignarJornada=:IdAsignarJornada";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(':IdAsignarJornada'=>$IdAsignarJornada));
		
		if ($stmt) {
			$response['status']  = 'success';
            $response['message'] = 'Eliminado con éxito ...';            
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede eliminar ...';
		}
		echo json_encode($response);
	}