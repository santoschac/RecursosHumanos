<?php
include("../../Modelo/Conexion.php");

$IdPermisoHora= $_POST['IdPermisoHora'];
$Fecha = $_POST['Fecha'];
$HoraInicio = $_POST['HoraInicio'];
$HoraFin = $_POST['HoraFin'];
$Motivo = $_POST['Motivo'];
//$IdPersonal = $_POST['IdPersonal'];

$sql = 'UPDATE permisoshora SET Fecha=:Fecha, HoraInicio=:HoraInicio, HoraFin=:HoraFin, Motivo=:Motivo where IdPermisoHora=:IdPermisoHora';
$statement = $pdo->prepare($sql);
if($statement->execute([':Fecha'=> $Fecha, ':HoraInicio'=>$HoraInicio, ':HoraFin' => $HoraFin, ':Motivo'=>$Motivo, ':IdPermisoHora'=>$IdPermisoHora]))
{
 echo 1;
}else{
  echo 2;
}
?>