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
		
		$statement = $pdo->prepare("INSERT INTO viaticos (Motivo, Monto, IdPoblacion, IdPersonal, Fecha) VALUES (:Motivo, :Monto, :IdPoblacion, :IdPersonal, :Fecha)");
		$result = $statement->execute(
			array(
				':Motivo'	=>	$_POST['Motivo'],
				':Monto' => $_POST['Monto'],
				':IdPoblacion' => $_POST['IdPoblacion'],
				':IdPersonal' => $_POST['IdPersonal'],
				':Fecha' => $_POST['Fecha']
				
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
			$statement = $pdo->prepare(
			"UPDATE viaticos SET Comprobado=:Comprobado, Cantidad=:Cantidad, FechaAprobado=:FechaAprobado WHERE IdViatico = :id"
		);
		$result = $statement->execute(
			array(
				':Comprobado'	=>	$_POST["Comprobado"],
				':Cantidad' => $_POST['Cantidad'],
				':FechaAprobado' => $_POST['FechaAprobado'],
				':id'			=>	$_POST["viatico_id"]
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


