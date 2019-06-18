<?php
include("../../Modelo/Conexion.php");

if(isset($_POST["poblacion_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT p.IdPoblacion, p.NombrePoblacion, p.IdEstado, e.NombreEstado, pa.IDPais, pa.NombrePais
		from poblacion p
		inner  join estado e on p.IdEstado = e.IdEstado
		inner join pais pa on e.IDPais = pa.IDPais where IdPoblacion = '".$_POST["poblacion_id"]."' "
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["NombrePoblacion"] = $row["NombrePoblacion"];
		$output["IDPais"] = $row["IDPais"];
		$output["IdEstado"] = $row['IdEstado'];
		
	}
	echo json_encode($output);
}
?>