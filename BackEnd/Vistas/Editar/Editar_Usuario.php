<?php

include("../../Modelo/Conexion.php");

$IdUsuario= $_POST['IdUsuario'];
$Usuario = $_POST['Usuario'];
$IdTipoUsuario= $_POST['IdTipoUsuario'];
$Contrasena=$_POST['Contrasena'];
$Contrasena = password_hash($Contrasena, PASSWORD_DEFAULT);
    
$sql1 = 'UPDATE usuario SET Usuario=:Usuario, Contrasena=:Contrasena, IdTipoUsuario=:IdTipoUsuario where IdUsuario = :IdUsuario';
$sentencia = $pdo->prepare($sql1);
if($sentencia->execute([':Usuario'=> $Usuario, ':Contrasena'=>$Contrasena, ':IdTipoUsuario'=>$IdTipoUsuario, ':IdUsuario'=> $IdUsuario]))
{
  echo 1;
}else
{
 echo 2;
}

?>