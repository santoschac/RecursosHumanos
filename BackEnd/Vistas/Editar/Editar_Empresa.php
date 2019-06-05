<?php
include("../../Modelo/Conexion.php");

if(isset($_POST["empresa_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM empresa 
		WHERE IdEmpresa = '".$_POST["empresa_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["NombreEmpresa"] = $row["NombreEmpresa"];
		$output["ClaveEmpresa"] = $row["ClaveEmpresa"];
		//$output["last_name"] = $row["last_name"];
		
	}
	echo json_encode($output);
}
?>