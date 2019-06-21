<?php

include("../../Modelo/Conexion.php");

    $IdAsignarJornada= $_POST['IdAsignarJornada'];
    $IdPersonal = $_POST['IdPersonal'];
    $IdJornada = $_POST['IdJornada'];
  
    $sql = 'UPDATE jornada SET IdPersonal= :IdPersonal, IdJornada= :IdJornada WHERE IdAsignarJornada= :IdAsignarJornada';
    
    $statement =$pdo->prepare($sql);    
    if($statement->execute([':IdPersonal'=>$IdPersonal, ':IdJornada'=>$IdJornada, ':IdAsignarJornada'=>$IdAsignarJornada])){
      echo 1;
    }
