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

$sql1 = 'SELECT u.IdUsuario, u.Usuario, u.Contrasena, u.IdTipoUsuario, p.IdPersonal, p.Nombre
from usuario u
inner join personal p on u.IdUsuario = p.IdUsuario where Usuario = ?';
$statement= $pdo->prepare($sql1);
$statement ->execute(array($Usuario));
$result = $statement->fetch();


if (password_verify($_POST['Contrasena'], $resultado['Contrasena'])) {	
				

	$_SESSION['IdUsuario'] = $resultado['IdUsuario'];
	$_SESSION['Usuario'] = $resultado['Usuario'];
	 $_SESSION['Contrasena'] = $resultado['Contrasena'];
	// $_SESSION['ApellidoPaterno'] = $resultado['ApellidoPaterno'];
	// $_SESSION['ApellidoMaterno'] = $resultado['ApellidoMaterno'];
	$_SESSION['IdTipoUsuario'] = $resultado['IdTipoUsuario'];
	$_SESSION['IdPersonal'] = $result['IdPersonal'];

	
	
		header("location: ../Vistas/index.php");
	
}else
{
	header("location: ../Vistas/login.php?error=true");		
}

?>