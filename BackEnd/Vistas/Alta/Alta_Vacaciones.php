<?php
include("../../Modelo/Conexion.php");


$IdPersonal = $_POST['IdPersonal'];
$Titulo = $_POST['Titulo'];
$Color = $_POST['Color'];
$FechaInicio = date("Y-m-d", strtotime($_POST['FechaInicio']));
$FechaFinal = date("Y-m-d", strtotime($_POST['FechaFinal']));


$sql = 'INSERT INTO vacaciones (Titulo, Color, FechaInicio, FechaFinal, IdPersonal)
VALUES (:Titulo, :Color, :FechaInicio, :FechaFinal, :IdPersonal)';

 $statement = $pdo->prepare($sql);
if($statement->execute([':Titulo'=> $Titulo, ':Color'=>$Color, ':FechaInicio'=> $FechaInicio, ':FechaFinal'=>$FechaFinal, ':IdPersonal'=>$IdPersonal]))
{
  echo 1; 
}else{
  echo 2;
}
?>