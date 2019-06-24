<?php
include("../../Modelo/Conexion.php");


$IdPersonal = $_POST['IdPersonal'];
$IdSucursal = $_POST['IdSucursal'];
$FechaInicio = date("Y-m-d", strtotime($_POST['FechaInicio']));
$IdPuesto = $_POST['IdPuesto'];
 

$sql = 'INSERT INTO cambios (FechaInicio, IdPersonal, IdSucursal, IdPuesto)
             VALUES (:FechaInicio, :IdPersonal, :IdSucursal, :IdPuesto)';
     
      $statement = $pdo->prepare($sql);
      if($statement->execute([':FechaInicio'=> $FechaInicio, ':IdPersonal'=>$IdPersonal, ':IdSucursal' => $IdSucursal, ':IdPuesto'=>$IdPuesto]))
          {
            echo 1;
          }
?>