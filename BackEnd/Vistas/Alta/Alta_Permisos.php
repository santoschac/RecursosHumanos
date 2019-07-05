<?php


include ("../../Modelo/Conexion.php");
session_start();

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
		$Dia= $_POST['Dia'];
		$Descripcion = $_POST['Descripcion'];
		if(isset($_POST['Devolucion'])){
			$Devolucion = $_POST['Devolucion'];
		}else{
			$Devolucion = NULL;
		}
		
		$IdPersonal = $_SESSION['IdPersonal'];

		$Estatus= "Espera";	
		
		$statement = $pdo->prepare("INSERT INTO permisos (Dia, Descripcion, Devolucion, Estatus, IdPersonal) VALUES (:Dia, :Descripcion, :Devolucion, :Estatus, :IdPersonal)");
		$result = $statement->execute(
			array(
				':Dia'	=>	$Dia,
				':Descripcion' => $Descripcion,
				':Devolucion' => $Devolucion,
				':Estatus' => $Estatus,
				':IdPersonal' => $IdPersonal
				
			)
		);
		if(!empty($result))
		{
			echo 1;
        }else{
			echo 3;
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
			"UPDATE permisos 
			SET  Estatus=:Estatus
			WHERE IdPermiso = :id
			"
		);
		$result = $statement->execute(
			array(
				':Estatus'	=>	$_POST["Estatus"],
				':id'			=>	$_POST["permiso_id"]
			)
		);
		if(!empty($result))
		{
			echo 1;
		}
		//}
		
	}
}

?>


