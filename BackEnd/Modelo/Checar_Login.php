<?php
session_start();
include ("Conexion.php");	

$Usuario = $_POST['Usuario'];
$Contrasena = $_POST['Contrasena'];

//Para verificar si el usuario existe
$sql = 'SELECT * FROM usuario WHERE Usuario = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($Usuario));
$resultado = $sentencia->fetch();


if (password_verify($_POST['Contrasena'], $resultado['Contrasena'])) {	
				

	$_SESSION['IdUsuario'] = $resultado['IdUsuario'];
	$_SESSION['Usuario'] = $resultado['Usuario'];
	 $_SESSION['Contrasena'] = $resultado['Contrasena'];
	// $_SESSION['ApellidoPaterno'] = $resultado['ApellidoPaterno'];
	// $_SESSION['ApellidoMaterno'] = $resultado['ApellidoMaterno'];
	$_SESSION['IdTipoUsuario'] = $resultado['IdTipoUsuario'];

	header("location: ../Vistas/index.php");
}else
{
	header("location: ../Vistas/login.php?error=true");		
}

?>