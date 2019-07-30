<?php


include ("../../Modelo/Conexion.php");
session_start();

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		
		// $Dia= $_POST['Dia'];
		// $Descripcion = $_POST['Descripcion'];
		// $Devolucion = $_POST['Devolucion'];	
		// $IdPersonal = $_SESSION['IdPersonal'];

		// $Estatus= "Espera";	
		$Comprobado = "Espera";
		$statement = $pdo->prepare("INSERT INTO viaticos (Motivo, Monto, IdPoblacion, IdPersonal, Fecha, Comprobado) VALUES (:Motivo, :Monto, :IdPoblacion, :IdPersonal, :Fecha, :Comprobado)");
		$result = $statement->execute(
			array(
				':Motivo'	=>	$_POST['Motivo'],
				':Monto' => $_POST['Monto'],
				':IdPoblacion' => $_POST['IdPoblacion'],
				':IdPersonal' => $_POST['IdPersonal'],
				':Fecha' => $_POST['Fecha'],
				':Comprobado'=> $Comprobado
				
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


