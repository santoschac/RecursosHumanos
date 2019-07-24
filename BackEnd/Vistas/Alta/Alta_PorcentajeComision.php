<?php
include("../../Modelo/Conexion.php");

$IdPersonal = $_POST['IdPersonal'];
$Porcentaje = $_POST['Porcentaje'];

$sql = 'INSERT INTO comisionporcentaje (Porcentaje, IdPersonal) VALUES (:Porcentaje, :IdPersonal)';
 
$statement = $pdo->prepare($sql);
if($statement->execute([':Porcentaje'=> $Porcentaje, ':IdPersonal'=>$IdPersonal]))
{
  echo 1;
}else
{
  echo 2;
}
?>