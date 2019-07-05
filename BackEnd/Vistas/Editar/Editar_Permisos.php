<?php
include("../../Modelo/Conexion.php");

if(isset($_POST["permiso_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM permisos 
		WHERE IdPermiso = '".$_POST["permiso_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["Dia"] = date("Y-m-d", strtotime($row["Dia"]));
		$output["Descripcion"] = $row["Descripcion"];
		$output["Devolucion"] = $row["Devolucion"];
		$output["Estatus"] = $row["Estatus"]; 
		
	}
	echo json_encode($output);
}
?>