<?php
include("../../Modelo/Conexion.php");

if(isset($_POST["viatico_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT v.IdViatico, v.Motivo, v.Monto, v.Comprobado, v.Cantidad, v.IdPoblacion, v.IdPersonal, v.Fecha, v.FechaAprobado, p.NombrePoblacion, e.IdEstado, e.NombreEstado
		from viaticos v
		inner join poblacion p on v.IdPoblacion = p.IdPoblacion
		inner join estado e on p.IdEstado = e.IdEstado
		WHERE IdViatico = '".$_POST["viatico_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["Motivo"] = $row["Motivo"];
		$output["Monto"] = $row["Monto"];
		$output["Fecha"] = date("Y-m-d", strtotime($row["Fecha"]));
		$output['IdPoblacion'] = $row['IdPoblacion'];
		$output['IdEstado'] = $row['IdEstado'];
		$output['Comprobado'] = $row['Comprobado'];
		$output['Cantidad'] = $row['Cantidad'];
		$output["FechaAprobado"] = date("Y-m-d", strtotime($row["FechaAprobado"]));
	}
	echo json_encode($output);
}
?>