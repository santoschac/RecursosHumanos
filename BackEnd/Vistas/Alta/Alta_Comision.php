<?php
include("../../Modelo/Conexion.php");

$MontoComision = $_POST['MontoComision'];
$Porcentaje = $_POST['Porcentaje'];

$MontoCobrado = (($Porcentaje * $MontoComision)/100);
$IdComisionPorcentaje = $_POST['IdComisionPorcentaje'];
$Fecha = date("Y-m-d", strtotime($_POST['Fecha']));


$sql = 'INSERT INTO comision ( MontoCobrado, MontoComision, IdComisionPorcentaje, Fecha, Porcentaje)
VALUES (:MontoCobrado, :MontoComision, :IdComisionPorcentaje, :Fecha, :Porcentaje)';
      

$statement = $pdo->prepare($sql);
if($statement->execute([':MontoCobrado'=> $MontoCobrado, ':MontoComision'=>$MontoComision, ':IdComisionPorcentaje' => $IdComisionPorcentaje, ':Fecha'=>$Fecha, ':Porcentaje'=>$Porcentaje]))
{
  echo 1; 
}else{
  echo 2;
}
?>