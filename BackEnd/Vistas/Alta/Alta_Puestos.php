<?php


include ("../../Modelo/Conexion.php");


if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
    
		$statement = $pdo->prepare("
			INSERT INTO puestos (NombrePuesto) 
			VALUES (:NombrePuesto)
    ");
   
		$result = $statement->execute(
			array(
				':NombrePuesto'	=>	$_POST["NombrePuesto"]
				
			)
		);
		if(!empty($result))
		{
			echo 1;
    }
    
	}
	if($_POST["operation"] == "Edit")
	{
	
		$statement = $pdo->prepare(
			"UPDATE puestos 
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


