<?php


include ("../../Modelo/Conexion.php");


if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		// $sql = 'SELECT * FROM puestos WHERE NombrePuesto = ?';
    	// $sentencia = $pdo->prepare($sql);
    	// $sentencia ->execute(array($_POST["NombrePuesto"]));
    	// $resultado = $sentencia->fetch();

		// if($resultado){
		// 	echo 3;
		// }else{
			

			if(isset($_POST["FechaFin"])){

				$FechaFin = $_POST["FechaFin"];
			}else{
				$FechaFin= NULL;
			}
			
			
		$statement = $pdo->prepare("INSERT INTO jornada (FechaInicio, FechaFin, HoraInicio, HoraFin) VALUES (:FechaInicio, :FechaFin, :HoraInicio, :HoraFin)");
		if ($statement->execute([':FechaInicio' => $_POST["FechaInicio"], ':FechaFin' =>	$FechaFin, ':HoraInicio' => $_POST["HoraInicio"], ':HoraFin' => $_POST['HoraFin']])){
			echo 1;
		}
		


		//}


    
	}
	if($_POST["operation"] == "Edit")
	{
	
		// $sql = 'SELECT * FROM puestos WHERE NombrePuesto = ?';
    	// $sentencia = $pdo->prepare($sql);
    	// $sentencia ->execute(array($_POST["NombrePuesto"]));
    	// $resultado = $sentencia->fetch();

		// if($resultado){
		// 	echo 3;
		// }else{
		 	$statement = $pdo->prepare(
			"UPDATE jornada 
			SET FechaInicio = :FechaInicio, FechaFin=:FechaFin, HoraInicio=:HoraInicio, HoraFin=:HoraFin
			WHERE IdJornada = :id
			"
		);
		$result = $statement->execute(
			array(
				':FechaInicio'	=>	$_POST["FechaInicio"],
				':FechaFin'=> $_POST['FechaFin'],
				':HoraInicio'=>$_POST['HoraInicio'],
				':HoraFin'=>$_POST['HoraFin'],
				':id'			=>	$_POST["jornada_id"]
			)
		);
		if(!empty($result))
		{
			echo 2;
		}
		//}
		
	}
}

?>


