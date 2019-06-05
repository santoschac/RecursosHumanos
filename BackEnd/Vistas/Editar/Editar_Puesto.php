<?php
include("../../Modelo/Conexion.php");

if(isset($_POST["puesto_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM puestos 
		WHERE IdPuesto = '".$_POST["puesto_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["NombrePuesto"] = $row["NombrePuesto"];
		//$output["last_name"] = $row["last_name"];
		
	}
	echo json_encode($output);
}
?>