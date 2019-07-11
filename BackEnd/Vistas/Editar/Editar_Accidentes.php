<?php

include("../../Modelo/Conexion.php");

  $IdAccidentes = $_POST['IdAccidentes'];
  $Descripcion = $_POST['Descripcion'];
  $Fecha= date("Y-m-d", strtotime($_POST['Fecha']));
  $Accidentes= $_POST['Accidentes'];
 

  $sql = 'UPDATE accidentes SET  Descripcion=:Descripcion, Fecha=:Fecha, Accidentes=:Accidentes WHERE IdAccidentes= :IdAccidentes';  
  $statement =$pdo->prepare($sql);


  if($statement->execute([':Descripcion'=>$Descripcion, ':Fecha'=>$Fecha, ':Accidentes'=>$Accidentes, ':IdAccidentes'=>$IdAccidentes])){
   
     echo 1;    
  }

?>