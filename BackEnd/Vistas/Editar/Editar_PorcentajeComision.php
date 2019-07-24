<?php

include("../../Modelo/Conexion.php");

  $IdComisionPorcentaje = $_POST['IdComisionPorcentaje'];
  $IdPersonal= $_POST['IdPersonal'];
  $Porcentaje = $_POST['Porcentaje'];
 
  $sql = 'UPDATE comisionporcentaje SET Porcentaje= :Porcentaje, IdPersonal= :IdPersonal WHERE IdComisionPorcentaje= :IdComisionPorcentaje';  
  $statement =$pdo->prepare($sql);

  if($statement->execute([':Porcentaje'=>$Porcentaje, ':IdPersonal'=>$IdPersonal, ':IdComisionPorcentaje'=>$IdComisionPorcentaje])){
    echo 1;
  }else{
    echo 2;
  }

?>