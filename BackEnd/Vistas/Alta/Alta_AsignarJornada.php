<?php
include("../../Modelo/Conexion.php");


    $IdPersonal = $_POST['IdPersonal'];
    $IdJornada = $_POST['IdJornada'];
    $FechaInicio = $_POST['FechaInicio'];
    $FechaFinal = $_POST['FechaFinal'];

    
    $sql = 'INSERT INTO asignarjornada (IdPersonal, IdJornada, FechaInicio, FechaFinal)
           VALUES (:IdPersonal, :IdJornada, :FechaInicio, :FechaFinal)';
   
    $statement = $pdo->prepare($sql);
    if($statement->execute([':IdPersonal'=>$IdPersonal, ':IdJornada'=>$IdJornada, ':FechaInicio'=>$FechaInicio, ':FechaFinal'=> $FechaFinal]))
        {
          echo 1;
        }else{
          echo 2;
        }
?>