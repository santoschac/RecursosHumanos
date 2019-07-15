<?php
include("../../Modelo/Conexion.php");


$Fecha = date("Y-m-d", strtotime($_POST['Fecha']));
$IdPersonal = $_POST['IdPersonal'];

$sql = 'INSERT INTO faltas (IdPersonal, Fecha) VALUES (:IdPersonal, :Fecha)';

$statement = $pdo->prepare($sql);
if($statement->execute([':IdPersonal'=> $IdPersonal, ':Fecha'=>$Fecha]))
{
 echo 1;
}else{
  echo 2;
}
?>