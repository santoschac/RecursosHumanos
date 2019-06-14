<?php

include("../../Modelo/Conexion.php");


$IdIncidencias = $_POST['IdIncidencias'];
$Descripcion = $_POST['Descripcion'];
    $Fecha = date("Y-m-d", strtotime($_POST['Fecha']));
    $Reporta = $_POST['Reporta'];
    $Autoriza = "pruba";
    $Accidentes = $_POST['Accidentes'];
    $IdPersonal = $_POST['IdPersonal'];

    
    

    
    $sql = 'UPDATE incidencias SET Descripcion= :Descripcion, Fecha= :Fecha, Reporta=:Reporta, Autoriza=:Autoriza, Accidentes=:Accidentes, IdPersonal=:IdPersonal WHERE IdIncidencias= :IdIncidencias';
    
    $statement =$pdo->prepare($sql);
    
    if($statement->execute([':Descripcion'=>$Descripcion, ':Fecha'=>$Fecha, ':Reporta'=>$Reporta, ':Autoriza'=>$Autoriza, ':Accidentes'=>$Accidentes, ':IdPersonal'=>$IdPersonal, ':IdIncidencias'=>$IdIncidencias])){
      echo 1;
    }

    


?>