<?php

include("../../Modelo/Conexion.php");

  $IdComision = $_POST['IdComision']; 
  $MontoCobranza = $_POST['MontoCobranza'];
  $Porcentaje = $_POST['Porcentaje'];
  $MontoComision = (($Porcentaje * $MontoCobranza)/100);
  $IdComisionPorcentaje = $_POST['IdComisionPorcentaje'];
  $Fecha = date("Y-m-d", strtotime($_POST['Fecha']));

  $sql = 'UPDATE comision SET  MontoCobranza= :MontoCobranza, MontoComision=:MontoComision, Fecha=:Fecha WHERE IdComision= :IdComision';  
  $statement =$pdo->prepare($sql);

  
  if($statement->execute([':MontoCobranza'=>$MontoCobranza, ':MontoComision'=>$MontoComision, ':Fecha'=>$Fecha, ':IdComision'=>$IdComision])){
   echo 1;
  }else{
    echo 2;
  }

?>