<?php
include("../../Modelo/Conexion.php");

if(isset($_POST["estado_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM estado 
		WHERE IdEstado = '".$_POST["estado_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["NombreEstado"] = $row["NombreEstado"];
		$output["IDPais"] = $row["IDPais"];
		
	}
	echo json_encode($output);
}
?>