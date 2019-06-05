<?php
include("../../Modelo/Conexion.php");



    $Nombre = $_POST['NombreCurso'];
    $Descripcion = $_POST['DescripcionCurso'];
    $Fecha = date("Y-m-d", strtotime($_POST['Fecha']));
    $Tipo = $_POST['Tipo'];


    $sql = 'SELECT * FROM cursos WHERE Nombre = ?';
    $sentencia = $pdo->prepare($sql);
    $sentencia ->execute(array($Nombre));
    $result = $sentencia->fetch();

    if($result){
        echo 1;
    }
    else{

        $sql = 'INSERT INTO cursos(Nombre, DescripcionCurso, Tipo, Fecha) values (:Nombre, :DescripcionCurso, :Tipo, :Fecha)';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute([':Nombre'=>$Nombre, ':DescripcionCurso'=>$Descripcion, ':Tipo'=>$Tipo, ':Fecha'=>$Fecha]);
        echo 2;
        
    }


   
