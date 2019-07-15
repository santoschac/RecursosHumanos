<?php


include ("../../Modelo/Conexion.php");

$IdPermiso = $_POST['IdPermiso'];
$Dia = date("Y-m-d", strtotime($_POST['Dia']));

$Descripcion = $_POST['Descripcion'];

if(isset($_POST['Devolucion'])){

	$Devolucion = $_POST['Devolucion'];
}else{

	$Devolucion = NULL;
}
		
$IdPersonal = $_POST['IdPersonal'];

$sql = 'UPDATE permisos set Dia=:Dia, Descripcion=:Descripcion, Devolucion=:Devolucion where IdPermiso=:IdPermiso';
$statement = $pdo->prepare($sql);

if($statement->execute([':Dia'=> $Dia, ':Descripcion'=>$Descripcion, ':Devolucion' => $Devolucion, ':IdPermiso'=>$IdPermiso]))
          {
            echo 1;
		  }else
		  {
			  echo 2;
		  }



		

  
?>


