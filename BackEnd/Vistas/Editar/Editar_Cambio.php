<?php

include("../../Modelo/Conexion.php");




  $IdCambio = $_POST['IdCambio'];
  $FechaInicio = date("Y-m-d", strtotime($_POST['FechaInicio']));
  $IdPersonal= $_POST['IdPersonal'];
  $IdSucursal = $_POST['IdSucursal'];
  $IdPuesto = $_POST['IdPuesto'];

  $sql = 'UPDATE cambios SET FechaInicio= :FechaInicio, IdPersonal= :IdPersonal, IdSucursal= :IdSucursal, IdPuesto = :IdPuesto WHERE IdCambio= :IdCambio';
  
  $statement =$pdo->prepare($sql);
  
  if($statement->execute([':FechaInicio'=>$FechaInicio, ':IdPersonal'=>$IdPersonal, ':IdSucursal'=>$IdSucursal, ':IdPuesto'=>$IdPuesto, ':IdCambio'=>$IdCambio])){
    echo 1;
  }

  

?>