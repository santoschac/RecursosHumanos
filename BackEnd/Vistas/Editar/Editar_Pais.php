<?php
include("../../Modelo/Conexion.php");

if(isset($_POST["pais_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM pais 
		WHERE IDPais = '".$_POST["pais_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["NombrePais"] = $row["NombrePais"];
		
	}
	echo json_encode($output);
}
?>