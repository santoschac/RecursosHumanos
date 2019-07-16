<?php
include("../../Modelo/Conexion.php");

$FechaInicio = date("Y-m-d", strtotime($_POST['FechaInicio']));
$FechaFin = date("Y-m-d", strtotime($_POST['FechaFin']));
$Motivo = $_POST['Motivo'];
$IdPersonal = $_POST['IdPersonal'];

$sql = 'INSERT INTO viajes (FechaInicio, FechaFin, Motivo, IdPersonal)
 VALUES (:FechaInicio, :FechaFin, :Motivo, :IdPersonal)';

$statement = $pdo->prepare($sql);
if($statement->execute([':FechaInicio'=> $FechaInicio, ':FechaFin'=>$FechaFin, ':Motivo' => $Motivo, ':IdPersonal'=>$IdPersonal]))
{
  echo 1;
}else{
  echo 2;
}
?>