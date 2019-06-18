<?php


include ("../../Modelo/Conexion.php");


if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		$sql = 'SELECT * FROM pais WHERE NombrePais = ?';
    	$sentencia = $pdo->prepare($sql);
    	$sentencia ->execute(array($_POST["NombrePais"]));
    	$resultado = $sentencia->fetch();

		if($resultado){
			echo 3;
		}else{
			
		$statement = $pdo->prepare("INSERT INTO pais (NombrePais) VALUES (:NombrePais)");
		$result = $statement->execute(
			array(
				':NombrePais'	=>	$_POST["NombrePais"]
				
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
	
		$sql = 'SELECT * FROM pais WHERE NombrePais = ?';
    	$sentencia = $pdo->prepare($sql);
    	$sentencia ->execute(array($_POST["NombrePais"]));
    	$resultado = $sentencia->fetch();

		if($resultado){
			echo 3;
		}else{
			$statement = $pdo->prepare(
			"UPDATE pais 
			SET NombrePais = :NombrePais
			WHERE IDPais = :id
			"
		);
		$result = $statement->execute(
			array(
				':NombrePais'	=>	$_POST["NombrePais"],
				':id'			=>	$_POST["pais_id"]
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


