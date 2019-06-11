<?php
include("../../Modelo/Conexion.php");

if(isset($_POST["sucursal_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT s.IdSucursal, s.NombreSucursal, s.Region, em.IdEmpresa, em.NombreEmpresa, s.IdPoblacion, p.NombrePoblacion, e.NombreEstado
		from Sucursal s, empresa em, Poblacion p, estado e
		where s.IdEmpresa=em.IdEmpresa and s.IdPoblacion = p.IdPoblacion and p.IdEstado = e.IdEstado and IdSucursal = '".$_POST["sucursal_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["NombreSucursal"] = $row["NombreSucursal"];
		$output["NombreEmpresa"] = $row["NombreEmpresa"];
		$output["NombreEstado"] = $row["NombreEstado"];
		$output["NombrePoblacion"] = $row["NombrePoblacion"];
		$output['Region'] = $row['Region'];
		//$output["last_name"] = $row["last_name"];
		
	}
	echo json_encode($output);
}
?>