<?php

	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once '../../Modelo/Conexion.php';
		
		$IdPersonal = $_POST['delete'];
		$sql = "DELETE FROM personal WHERE IdPersonal=:IdPersonal";
		$stmt = $pdo->prepare($sql);
		if($stmt->execute(array(':IdPersonal'=>$IdPersonal))){


			$IdUsuario = $_POST['IdUsuario'];
		$sql1 = "DELETE FROM usuario WHERE IdUsuario=:IdUsuario";
		$stmt1 = $pdo->prepare($sql1);
		$stmt1->execute(array(':IdUsuario'=>$IdUsuario));
		}

		if ($stmt1) {
			$response['status']  = 'success';
            $response['message'] = 'Eliminado con éxito ...';            
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede eliminar ...';
		}
		echo json_encode($response);
	}