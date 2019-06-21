<?php
include("../../Modelo/Conexion.php");


    $IdPersonal = $_POST['IdPersonal'];
    $IdJornada = $_POST['IdJornada'];
   
    
//     $sql = 'SELECT * FROM usuario WHERE Usuario = ?';
//     $sentencia = $pdo->prepare($sql);
//     $sentencia ->execute(array($_POST["Usuario"]));
//     $resultado = $sentencia->fetch();

//   if($resultado){
//     echo 2;
//   }else{

    

    $sql = 'INSERT INTO asignarjornada (IdPersonal, IdJornada)
           VALUES (:IdPersonal, :IdJornada)';
   
    $statement = $pdo->prepare($sql);
    if($statement->execute([':IdPersonal'=>$IdPersonal, ':IdJornada'=>$IdJornada]))
        {
          echo 1;

        }  
  //}


   

?>