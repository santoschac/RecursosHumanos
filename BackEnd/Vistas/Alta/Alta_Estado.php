<?php


include ("../../Modelo/Conexion.php");


if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		$sql = 'SELECT * FROM estado WHERE NombreEstado = ?';
    	$sentencia = $pdo->prepare($sql);
    	$sentencia ->execute(array($_POST["NombreEstado"]));
    	$resultado = $sentencia->fetch();

		if($resultado){
			echo 3;
		}else{
			
		$statement = $pdo->prepare("INSERT INTO estado (NombreEstado, IDPais) VALUES (:NombreEstado, :IDPais)");
		$result = $statement->execute(
			array(
				':NombreEstado'	=>	$_POST["NombreEstado"],
				'IDPais' => $_POST['IDPais']
				
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
	
		$sql = 'SELECT * FROM estado WHERE NombreEstado = ?';
    	$sentencia = $pdo->prepare($sql);
    	$sentencia ->execute(array($_POST["NombreEstado"]));
    	$resultado = $sentencia->fetch();

		if($resultado){
			echo 3;
		}else{
			$statement = $pdo->prepare(
			"UPDATE estado 
			SET NombreEstado = :NombreEstado, IDPais=:IDPais
			WHERE IdEstado = :id
			"
		);
		$result = $statement->execute(
			array(
				':NombreEstado'	=>	$_POST["NombreEstado"],
				':IDPais' => $_POST['IDPais'],
				':id'			=>	$_POST["estado_id"]
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


