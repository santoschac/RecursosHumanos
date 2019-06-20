<?php
include("../../Modelo/Conexion.php");

if(isset($_POST["jornada_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM jornada 
		WHERE IdJornada = '".$_POST["jornada_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["FechaInicio"] = $row["FechaInicio"];
		$output["FechaFin"] = $row["FechaFin"];
		$output["HoraInicio"] = $row["HoraInicio"];
		$output["HoraFin"] = $row["HoraFin"];
		
	}
	echo json_encode($output);
}
?>