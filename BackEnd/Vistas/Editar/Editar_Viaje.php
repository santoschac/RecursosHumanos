<?php

include("../../Modelo/Conexion.php");

  $IdViaje = $_POST['IdViaje'];
  $FechaInicio = date("Y-m-d", strtotime($_POST['FechaInicio']));
  $FechaFin = date("Y-m-d", strtotime($_POST['FechaFin']));
  $Motivo = $_POST['Motivo'];
  //$IdPersonal= $_POST['IdPersonal'];


  $sql = 'UPDATE viajes SET FechaInicio=:FechaInicio, FechaFin=:FechaFin, Motivo=:Motivo WHERE IdViaje= :IdViaje';  
  $statement =$pdo->prepare($sql);

  if($statement->execute([':FechaInicio'=>$FechaInicio, ':FechaFin'=>$FechaFin, ':Motivo'=>$Motivo, ':IdViaje'=>$IdViaje])){
   
    echo 1;
  }else{
    echo 2;
  }
?>