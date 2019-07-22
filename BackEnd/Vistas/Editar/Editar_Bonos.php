<?php

include("../../Modelo/Conexion.php");

  $IdBono = $_POST['IdBono'];
  $Descripcion = $_POST['Descripcion'];
  $Fecha = date("Y-m-d", strtotime($_POST['Fecha']));
  $Monto = $_POST['Monto'];
  $IdPersonal= $_POST['IdPersonal'];
  

  $sql = 'UPDATE bonos SET  Descripcion=:Descripcion, Fecha=:Fecha, Monto=:Monto, IdPersonal=:IdPersonal WHERE IdBono= :IdBono';  
  $statement =$pdo->prepare($sql);

  
  if($statement->execute([':Descripcion'=>$Descripcion, ':Fecha'=>$Fecha, ':Monto'=>$Monto, ':IdPersonal'=>$IdPersonal, ':IdBono'=>$IdBono])){
   
    echo 1;
  }

?>