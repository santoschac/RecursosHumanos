<?php
include("../../Modelo/Conexion.php");


$Descripcion = $_POST['Descripcion'];
$Fecha = date("Y-m-d", strtotime($_POST['Fecha']));
$Reporta = $_POST['Reporta'];
$Accidentes = $_POST['Accidentes'];
$IdPersonal = $_POST['IdPersonal'];


$sql = 'INSERT INTO accidentes (Descripcion, Fecha, Reporta, Accidentes, IdPersonal)
VALUES (:Descripcion, :Fecha, :Reporta, :Accidentes, :IdPersonal)';

$statement = $pdo->prepare($sql);
if($statement->execute([':Descripcion'=> $Descripcion, ':Fecha'=>$Fecha, ':Reporta' => $Reporta, ':Accidentes'=>$Accidentes, ':IdPersonal'=>$IdPersonal]))
{
  echo 1;
}else{
  echo 2;
}   
?>