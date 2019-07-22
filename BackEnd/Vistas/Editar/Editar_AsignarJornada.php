<?php

include("../../Modelo/Conexion.php");

    $IdAsignarJornada= $_POST['IdAsignarJornada'];
    $IdPersonal = $_POST['IdPersonal'];
    $IdJornada = $_POST['IdJornada'];
    $FechaInicio = $_POST['FechaInicio'];
    $FechaFinal = $_POST['FechaFinal'];
  
    $sql = 'UPDATE asignarjornada SET IdPersonal= :IdPersonal, IdJornada= :IdJornada, FechaInicio=:FechaInicio, FechaFinal=:FechaFinal WHERE IdAsignarJornada= :IdAsignarJornada';
    
    $statement =$pdo->prepare($sql);    
    if($statement->execute([':IdPersonal'=>$IdPersonal, ':IdJornada'=>$IdJornada, ':FechaInicio'=>$FechaInicio, ':FechaFinal'=>$FechaFinal, ':IdAsignarJornada'=>$IdAsignarJornada])){
      echo 1;
    }