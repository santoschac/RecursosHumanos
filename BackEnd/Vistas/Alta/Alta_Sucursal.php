<?php
include("../../Modelo/Conexion.php");

    $NombreSucursal = $_POST['NombreSucursal'];
    $Region = $_POST['Region'];
    $IdEmpresa = $_POST['IdEmpresa'];
    $IdPoblacion = $_POST['IdPoblacion'];


    $sql = 'SELECT * FROM sucursal WHERE NombreSucursal = ? and IdEmpresa= ? ';
    $sentencia = $pdo->prepare($sql);
    $sentencia ->execute(array($NombreSucursal, $IdEmpresa));
    $result = $sentencia->fetch();

    if($result){
        echo 1;
    }
    else{

        $sql = 'INSERT INTO sucursal (NombreSucursal, Region, IdEmpresa, IdPoblacion) values (:NombreSucursal, :Region, :IdEmpresa, :IdPoblacion)';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute([':NombreSucursal'=>$NombreSucursal, ':Region'=>$Region, ':IdEmpresa'=>$IdEmpresa, ':IdPoblacion'=>$IdPoblacion]);
        echo 2;
        
    }