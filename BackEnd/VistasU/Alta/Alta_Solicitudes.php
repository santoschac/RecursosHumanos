<?php


include ("../../Modelo/Conexion.php");


if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		// $sql = 'SELECT * FROM puestos WHERE NombrePuesto = ?';
    	// $sentencia = $pdo->prepare($sql);
    	// $sentencia ->execute(array($_POST["NombrePuesto"]));
    	// $resultado = $sentencia->fetch();

		// if($resultado){
		// 	echo 3;
		// }else{
		$Estatus= "Espera";	
		$FechaSolicitud = date("Y-m-d", strtotime($_POST['FechaSolicitud']));
		$statement = $pdo->prepare("INSERT INTO solicitudes (Descripcion, FechaSolicitud, Estatus, IdPersonal, Solicitud) VALUES (:Descripcion, :FechaSolicitud, :Estatus, :IdPersonal, :Solicitud)");
		$result = $statement->execute(
			array(
				':Descripcion'	=>	$_POST["Descripcion"],
				':FechaSolicitud' => $FechaSolicitud,
				':Estatus' => $Estatus,
				':IdPersonal' => $_POST['IdPersonal'],
				':Solicitud' => $_POST['Solicitud']
				
			)
		);
		if(!empty($result))
		{
			echo 1;
        }

		//}
		

    
	}
	if($_POST["operation"] == "Edit")
	{
	
		// $sql = 'SELECT * FROM puestos WHERE NombrePuesto = ?';
    	// $sentencia = $pdo->prepare($sql);
    	// $sentencia ->execute(array($_POST["NombrePuesto"]));
    	// $resultado = $sentencia->fetch();

		// if($resultado){
		// 	echo 3;
		// }else{
			$statement = $pdo->prepare(
			"UPDATE solicitudes 
			SET NombrePuesto = :NombrePuesto
			WHERE IdPuesto = :id
			"
		);
		$result = $statement->execute(
			array(
				':NombrePuesto'	=>	$_POST["NombrePuesto"],
				':id'			=>	$_POST["puesto_id"]
			)
		);
		if(!empty($result))
		{
			echo 2;
		}
		//}
		
	}
}

?>


