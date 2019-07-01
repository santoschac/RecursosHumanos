<?php
include("../../Modelo/Conexion.php");


$IdPersonal = $_POST['IdPersonal'];
$IdSucursal = $_POST['IdSucursal'];
$FechaInicio = date("Y-m-d", strtotime($_POST['FechaInicio']));
$IdPuesto = $_POST['IdPuesto'];
$Descripcion = $_POST['Descripcion'];

      $sql = 'INSERT INTO cambios (FechaInicio, IdPersonal, IdSucursal, IdPuesto, Descripcion)
             VALUES (:FechaInicio, :IdPersonal, :IdSucursal, :IdPuesto, :Descripcion)';
      
      $sql1 = "UPDATE personal set IdPuesto=:IdPuesto, IdSucursal=:IdSucursal where IdPersonal=:IdPersonal";
      $sentencia = $pdo->prepare($sql1);
      


      $statement = $pdo->prepare($sql);
      if($statement->execute([':FechaInicio'=> $FechaInicio, ':IdPersonal'=>$IdPersonal, ':IdSucursal' => $IdSucursal, ':IdPuesto'=>$IdPuesto, ':Descripcion'=>$Descripcion]))
          {
            if($sentencia ->execute([':IdPuesto'=>$IdPuesto, ':IdSucursal'=>$IdSucursal, ':IdPersonal'=>$IdPersonal])){
              echo 1;
            }
           
          }
?>