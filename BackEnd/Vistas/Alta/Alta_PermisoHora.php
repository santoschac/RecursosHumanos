<?php
include("../../Modelo/Conexion.php");

$Fecha = $_POST['Fecha'];
$HoraInicio = $_POST['HoraInicio'];
$HoraFin = $_POST['HoraFin'];
$Motivo = $_POST['Motivo'];
$IdPersonal = $_POST['IdPersonal'];

$sql = 'INSERT INTO permisoshora (Fecha, HoraInicio, HoraFin, Motivo, IdPersonal)
VALUES ( :Fecha, :HoraInicio, :HoraFin, :Motivo, :IdPersonal)';

$statement = $pdo->prepare($sql);
if($statement->execute([':Fecha'=> $Fecha, ':HoraInicio'=>$HoraInicio, ':HoraFin' => $HoraFin, ':Motivo'=>$Motivo, ':IdPersonal'=>$IdPersonal]))
{
 echo 1;
}else{
  echo 2;
}
?>