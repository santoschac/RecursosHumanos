<?php

	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once '../../Modelo/Conexion.php';
		
		$IdIncapacidad = $_POST['delete'];

		// eliminar el archio localmente
		$sql1 = 'SELECT p.Nombre , p.ApellidoPaterno, p.ApellidoMaterno, u.IdUsuario, u.Usuario, i.IdIncapacidad, i.DiaInicio, i.DiaFinal, i.Descripcion, i.Documento
		from personal p
		inner join usuario u on p.IdUsuario = u.IdUsuario
		inner join incapacidad i on p.IdPersonal = i.IdPersonal where IdIncapacidad = ?';
		$sentencia = $pdo->prepare($sql1);
		$sentencia->execute(array($IdIncapacidad));
		$result = $sentencia->fetch();

		$NombreCarpeta = $result['Usuario'];
		$NombreDocumento = $result['Documento'];
		
		unlink('../../VistasU/Documentos/Incapacidades/'.$NombreCarpeta.'/'.$NombreDocumento);




		$sql = "DELETE FROM incapacidad WHERE IdIncapacidad=:IdIncapacidad";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(':IdIncapacidad'=>$IdIncapacidad));
		
		if ($stmt) {
			$response['status']  = 'success';
            $response['message'] = 'Eliminado con éxito ...';            
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede eliminar ...';
		}
		echo json_encode($response);
	}