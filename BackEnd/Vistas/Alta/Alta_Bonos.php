<?php
include("../../Modelo/Conexion.php");

$Descripcion = $_POST['Descripcion'];
$Fecha = date("Y-m-d", strtotime($_POST['Fecha']));
$Monto = $_POST['Monto'];
$IdPersonal = $_POST['IdPersonal'];

$sql = 'INSERT INTO bonos (Descripcion, Fecha, Monto, IdPersonal)
 VALUES (:Descripcion, :Fecha, :Monto, :IdPersonal)';

   $statement = $pdo->prepare($sql);
   if($statement->execute([':Descripcion'=> $Descripcion, ':Fecha'=>$Fecha, ':Monto' => $Monto, ':IdPersonal'=>$IdPersonal]))
   {
     echo 1;
   }else{
     echo 2;
   }
?>