<?php


include ("../../Modelo/Conexion.php");
session_start();

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		
	
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

		
    
	}
	if($_POST["operation"] == "Edit")
	{
	

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
		
		
	}
}

?>