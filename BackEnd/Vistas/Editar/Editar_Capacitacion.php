<?php

include("../../Modelo/Conexion.php");

  $IdCapacitacion = $_POST['IdCapacitacion'];
  $Evaluacion = $_POST['Evaluacion'];
  $IdPersonal= $_POST['IdPersonal'];
  $IdCurso = $_POST['IdCurso'];
  $FechaCapacitacion = date("Y-m-d", strtotime($_POST['FechaCapacitacion']));


  $sql = 'UPDATE capacitacion SET  Evaluacion=:Evaluacion, IdPersonal=:IdPersonal, IdCurso=:IdCurso, FechaCapacitacion=:FechaCapacitacion WHERE IdCapacitacion= :IdCapacitacion';
  
  $statement =$pdo->prepare($sql);
  
  if($statement->execute([':Evaluacion'=>$Evaluacion, ':IdPersonal'=>$IdPersonal, ':IdCurso'=>$IdCurso, ':FechaCapacitacion'=>$FechaCapacitacion, ':IdCapacitacion'=>$IdCapacitacion])){
    echo 1;
  }

?>