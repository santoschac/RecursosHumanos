<?php

include("../../Modelo/Conexion.php");




  $IdCambio = $_POST['IdCambio'];
  $FechaInicio = date("Y-m-d", strtotime($_POST['FechaInicio']));
  $IdPersonal= $_POST['IdPersonal'];
  $IdSucursal = $_POST['IdSucursal'];
  $IdPuesto = $_POST['IdPuesto'];
  $Descripcion = $_POST['Descripcion'];

  $sql = 'UPDATE cambios SET FechaInicio= :FechaInicio, IdPersonal= :IdPersonal, IdSucursal= :IdSucursal, IdPuesto = :IdPuesto, Descripcion=:Descripcion WHERE IdCambio= :IdCambio';  
  $statement =$pdo->prepare($sql);

  $sql1 = "UPDATE personal set IdPuesto=:IdPuesto, IdSucursal=:IdSucursal where IdPersonal=:IdPersonal";
  $sentencia = $pdo->prepare($sql1);
  
  if($statement->execute([':FechaInicio'=>$FechaInicio, ':IdPersonal'=>$IdPersonal, ':IdSucursal'=>$IdSucursal, ':IdPuesto'=>$IdPuesto, ':Descripcion'=>$Descripcion, ':IdCambio'=>$IdCambio])){
   
    if($sentencia ->execute([':IdPuesto'=>$IdPuesto, ':IdSucursal'=>$IdSucursal, ':IdPersonal'=>$IdPersonal])){
      echo 1;
    }
  }

  

?>