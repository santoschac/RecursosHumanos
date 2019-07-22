<?php
include ("../../Modelo/Conexion.php");

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		$sql = 'SELECT * FROM poblacion WHERE NombrePoblacion = ?';
    	$sentencia = $pdo->prepare($sql);
    	$sentencia ->execute(array($_POST["NombrePoblacion"]));
    	$resultado = $sentencia->fetch();

		if($resultado){
			echo 3;
		}else{
			
		$statement = $pdo->prepare("INSERT INTO poblacion (NombrePoblacion, IdEstado) VALUES (:NombrePoblacion, :IdEstado)");
		$result = $statement->execute(
			array(
				':NombrePoblacion'	=>	$_POST["NombrePoblacion"],
				'IdEstado' => $_POST['IdEstado']
				
			)
		);
		if(!empty($result))
		{
			echo 1;
        }

		}
	}
	if($_POST["operation"] == "Edit")
	{
	
		$sql = 'SELECT * FROM poblacion WHERE NombrePoblacion = ?';
    	$sentencia = $pdo->prepare($sql);
    	$sentencia ->execute(array($_POST["NombrePoblacion"]));
    	$resultado = $sentencia->fetch();

		if($resultado){
			echo 3;
		}else{
			$statement = $pdo->prepare(
			"UPDATE poblacion 
			SET NombrePoblacion = :NombrePoblacion, IdEstado=:IdEstado
			WHERE IdPoblacion = :id
			"
		);
		$result = $statement->execute(
			array(
				':NombrePoblacion'	=>	$_POST["NombrePoblacion"],
				':IdEstado' => $_POST['IdEstado'],
				':id'			=>	$_POST["poblacion_id"]
			)
		);
		if(!empty($result))
		{
			echo 2;
		}
		}
		
	}
}

?>