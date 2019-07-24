<?php

include("../../Modelo/Conexion.php");

  $IdComision = $_POST['IdComision']; 
  $MontoComision = $_POST['MontoComision'];
  $Porcentaje = $_POST['Porcentaje'];
  $MontoCobrado = (($Porcentaje * $MontoComision)/100);
  $IdComisionPorcentaje = $_POST['IdComisionPorcentaje'];
  $Fecha = date("Y-m-d", strtotime($_POST['Fecha']));

  $sql = 'UPDATE comision SET  MontoCobrado= :MontoCobrado, MontoComision=:MontoComision, Fecha=:Fecha WHERE IdComision= :IdComision';  
  $statement =$pdo->prepare($sql);

  
  if($statement->execute([':MontoCobrado'=>$MontoCobrado, ':MontoComision'=>$MontoComision, ':Fecha'=>$Fecha, ':IdComision'=>$IdComision])){
   echo 1;
  }else{
    echo 2;
  }

?>