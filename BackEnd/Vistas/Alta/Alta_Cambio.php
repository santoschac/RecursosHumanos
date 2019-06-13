<?php
include("../../Modelo/Conexion.php");

  $EmpresaAnterior = $_POST['EmpresaAnterior'];
  $SucursalAnterior = $_POST['SucursalAnterior'];
  $PuestoAnterior= $_POST['PuestoAnterior'];
  $FechaInicio = date("Y-m-d", strtotime($_POST['FechaInicio']));
  
  
  // $IdSucursal = $_POST['SucursalNuevo'];  
  // $sql = 'SELECT s.IdSucursal, s.NombreSucursal, e.IdEmpresa, e.NombreEmpresa
  // from sucursal s
  // inner join empresa e on s.IdEmpresa=e.IdEmpresa where s.IdSucursal = ?';
  // $sentencia = $pdo->prepare($sql);
  // $sentencia->execute(array($IdSucursal));
  // $resultado = $sentencia->fetch();
  
  // $SucursalNuevo = $resultado['NombreSucursal'];
  // $EmpresaNuevo = $resultado['NombreEmpresa'];



  //$SucursalNuevo = $_POST['SucursalNuevo'];
  //$EmpresaNuevo = $_POST['EmpresaNuevo'];
  $output = array();
	$statement = $pdo->prepare(
		"SELECT s.IdSucursal, s.NombreSucursal, e.IdEmpresa, e.NombreEmpresa
    from sucursal s
    inner join empresa e on s.IdEmpresa=e.IdEmpresa where s.IdSucursal = '".$_POST["SucursalNuevo"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['NombreSucursal'] = $row['NombreSucursal'];
		$output['NombreEmpresa'] = $row['NombreEmpresa'];
		
	}

 $SucursalNuevo = $output['NombreSucursal'];
$EmpresaNuevo =  $output['NombreEmpresa'];



  $PuestoNuevo = $_POST['PuestoNuevo'];
  $IdPersonal = $_POST['IdPersonal'];
      
  
  
      $sql = 'INSERT INTO cambios (EmpresaAnterior, SucursalAnterior, PuestoAnterior, FechaInicio, EmpresaNuevo, SucursalNuevo, PuestoNuevo, IdPersonal)
             VALUES (:EmpresaAnterior, :SucursalAnterior, :PuestoAnterior, :FechaInicio, :EmpresaNuevo, :SucursalNuevo, :PuestoNuevo, :IdPersonal)';
     
      $statement = $pdo->prepare($sql);
      if($statement->execute([':EmpresaAnterior'=> $EmpresaAnterior, ':SucursalAnterior'=>$SucursalAnterior, ':PuestoAnterior' => $PuestoAnterior, ':FechaInicio'=>$FechaInicio,
       ':EmpresaNuevo'=>$EmpresaNuevo, ':SucursalNuevo'=>$SucursalNuevo, ':PuestoNuevo'=> $PuestoNuevo, ':IdPersonal'=>$IdPersonal ]))
          {
            echo 1;
          }
?>