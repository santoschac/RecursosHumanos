<?php


include ("../../Modelo/Conexion.php");

$Dia= $_POST['Dia'];
$Descripcion = $_POST['Descripcion'];

if(isset($_POST['Devolucion'])){

	$Devolucion = $_POST['Devolucion'];
}else{

	$Devolucion = NULL;
}
		
$IdPersonal = $_POST['IdPersonal'];

$sql = 'INSERT INTO permisos (Dia, Descripcion, Devolucion,  IdPersonal) VALUES (:Dia, :Descripcion, :Devolucion, :IdPersonal)';
$statement = $pdo->prepare($sql);

if($statement->execute([':Dia'=> $Dia, ':Descripcion'=>$Descripcion, ':Devolucion' => $Devolucion, ':IdPersonal'=>$IdPersonal]))
          {
            echo 1;
		  }else
		  {
			  echo 2;
		  }



		

  
?>


