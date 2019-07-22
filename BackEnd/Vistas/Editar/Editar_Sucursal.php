<?php
include ("../../Modelo/Conexion.php");

	$IdSucursal= $_POST['IdSucursal'];
    $NombreSucursal = $_POST['NombreSucursal'];
    $Region = $_POST['Region'];
    $IdEmpresa = $_POST['IdEmpresa'];
    $IdPoblacion = $_POST['IdPoblacion'];

    $sql = 'UPDATE sucursal SET NombreSucursal=:NombreSucursal, Region=:Region, IdEmpresa=:IdEmpresa, IdPoblacion=:IdPoblacion WHERE IdSucursal=:IdSucursal';
    $sentencia=$pdo->prepare($sql);
    if($sentencia->execute([':NombreSucursal'=>$NombreSucursal, ':Region'=>$Region, ':IdEmpresa'=>$IdEmpresa, ':IdPoblacion'=>$IdPoblacion, ':IdSucursal'=>$IdSucursal]))
    {
      echo 1;
    }else{
		echo 2;
	}