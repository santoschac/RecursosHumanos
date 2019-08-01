<?php
include("../../Modelo/Conexion.php");

 $Evaluacion = $_POST['Evaluacion'];
 $IdPersonal = $_POST['IdPersonal'];
 $IdCurso = $_POST['IdCurso'];
 $FechaCapacitacion = date("Y-m-d", strtotime($_POST['FechaCapacitacion']));

 

$sql = 'INSERT INTO capacitacion (Evaluacion, IdPersonal, IdCurso, FechaCapacitacion)
             VALUES (:Evaluacion, :IdPersonal, :IdCurso, :FechaCapacitacion)';
     
      $statement = $pdo->prepare($sql);
      if($statement->execute([':Evaluacion'=> $Evaluacion, ':IdPersonal'=>$IdPersonal, ':IdCurso' => $IdCurso, ':FechaCapacitacion'=>$FechaCapacitacion]))
      {
        echo 1;
      }else{
        echo 2;
      }
?>