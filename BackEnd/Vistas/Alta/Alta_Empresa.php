<?php


include ("../../Modelo/Conexion.php");


if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
    
		$statement = $pdo->prepare("INSERT INTO empresa (NombreEmpresa, ClaveEmpresa) 
			VALUES (:NombreEmpresa, :ClaveEmpresa)
    ");
   
		$result = $statement->execute(
			array(
				':NombreEmpresa'	=>	$_POST["NombreEmpresa"],
				':ClaveEmpresa'	=>	$_POST["ClaveEmpresa"]
				
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
			"UPDATE empresa 
			SET NombreEmpresa = :NombreEmpresa, ClaveEmpresa=:ClaveEmpresa
			WHERE IdEmpresa = :IdEmpresa
			"
		);
		$result = $statement->execute(
			array(
				':NombreEmpresa'	=>	$_POST["NombreEmpresa"],
				':ClaveEmpresa'	=>	$_POST["ClaveEmpresa"],
				':IdEmpresa'			=>	$_POST["empresa_id"]
			)
		);
		if(!empty($result))
		{
			echo 2;
		}
	}
}

?>


