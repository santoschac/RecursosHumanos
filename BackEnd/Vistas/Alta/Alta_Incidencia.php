<?php
include("../../Modelo/Conexion.php");



    $Descripcion = $_POST['Descripcion'];
    $Fecha = date("Y-m-d", strtotime($_POST['Fecha']));
    $Reporta = $_POST['Reporta'];
    $Autoriza = "pruba";
    $Accidentes = $_POST['Accidentes'];
    $IdPersonal = $_POST['IdPersonal'];


    

        $sql = 'INSERT INTO incidencias (Descripcion, Fecha, Reporta, Autoriza, Accidentes, IdPersonal) values (:Descripcion, :Fecha, :Reporta, :Autoriza, :Accidentes, :IdPersonal)';
        $sentencia = $pdo->prepare($sql);
       if($sentencia->execute([':Descripcion'=>$Descripcion, ':Fecha'=>$Fecha, ':Reporta'=>$Reporta, ':Autoriza'=>$Autoriza, ':Accidentes'=>$Accidentes, ':IdPersonal'=>$IdPersonal])) {
           echo 1;
       }
        
        
    


   
