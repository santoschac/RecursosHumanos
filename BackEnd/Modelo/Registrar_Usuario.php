<?php

include ("Conexion.php");

$Usuario = $_POST['Usuario'];
$Contrasena = $_POST['Contrasena'];
$tipo = 1;

//Para verificar si el usuario existe
$sql = 'SELECT * FROM usuario WHERE Usuario = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($Usuario));
$resultado = $sentencia->fetch();


if ($resultado) {
  header("location: ../Vistas/Registro.php?existe=true");
    die();
}

//La contraseña se pasa al hash(encriptacion)
$Contrasena = password_hash($Contrasena, PASSWORD_DEFAULT);

$sql_agregar = 'INSERT INTO usuario (Usuario, Contrasena, IdTipoUsuario) VALUES (?,?,?)';
$agregar = $pdo->prepare($sql_agregar);

if ($agregar->execute(array($Usuario, $Contrasena, $tipo))) {

  header("location: ../Vistas/login.php?creado=true");
}else{
  echo "Error al crear el usuario.";
  
}
?>