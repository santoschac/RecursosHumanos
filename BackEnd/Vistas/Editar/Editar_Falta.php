<?php

include("../../Modelo/Conexion.php");

  $IdFalta = $_POST['IdFalta'];
  $Fecha = date("Y-m-d", strtotime($_POST['Fecha']));
  $IdPersonal= $_POST['IdPersonal'];


  $sql = 'UPDATE faltas SET Fecha= :Fecha WHERE IdFalta= :IdFalta';  
  $statement =$pdo->prepare($sql);

  if($statement->execute([':Fecha'=>$Fecha, ':IdFalta'=>$IdFalta])){
   
    echo 1;
  }else{
    echo 2;
  }

?>