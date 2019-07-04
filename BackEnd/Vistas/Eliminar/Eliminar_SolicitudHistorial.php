<?php

	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once '../../Modelo/Conexion.php';
		
		$IdSolicitudes = $_POST['delete'];

		// eliminar el archio localmente
		$sql1 = 'SELECT p.Nombre , p.ApellidoPaterno, p.ApellidoMaterno, u.IdUsuario, u.Usuario,s.IdSolicitudes, s.Descripcion, s.FechaSolicitud, s.FechaAtencion, s.Atendido, 
		s.Estatus, s.IdPersonal, s.Solicitud, s.Documento 
		from personal p
		inner join usuario u on p.IdUsuario = u.IdUsuario
		inner join solicitudes s on p.IdPersonal = s.IdPersonal where IdSolicitudes =  ?';
		$sentencia = $pdo->prepare($sql1);
		$sentencia->execute(array($IdSolicitudes));
		$result = $sentencia->fetch();

		$NombreCarpeta = $result['Usuario'];
		$NombreDocumento = $result['Documento'];
		
		unlink('../../VistasU/Documentos/'.$NombreCarpeta.'/'.$NombreDocumento);

		$sql = "DELETE FROM solicitudes WHERE IdSolicitudes=:IdSolicitudes";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(':IdSolicitudes'=>$IdSolicitudes));
		
		if ($stmt) {
			$response['status']  = 'success';
            $response['message'] = 'Eliminado con éxito ...';            
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede eliminar ...';
		}
		echo json_encode($response);
	}