<?php
include ("../../Modelo/Conexion.php");

    $IdCurso= $_POST['IdCurso'];
    $Nombre = $_POST['NombreCurso'];
    $Descripcion = $_POST['DescripcionCurso'];
    $Tipo = $_POST['Tipo'];
    $Fecha = $_POST['Fecha'];

    $sql = 'UPDATE cursos SET Nombre=:Nombre, DescripcionCurso=:DescripcionCurso, Tipo=:Tipo, Fecha=:Fecha WHERE IdCurso=:IdCurso';
    $sentencia=$pdo->prepare($sql);
    if($sentencia->execute([':Nombre'=>$Nombre, ':DescripcionCurso'=>$Descripcion, ':Tipo'=>$Tipo, ':Fecha'=>$Fecha, ':IdCurso'=>$IdCurso]))
    {
      echo 1;
    }

