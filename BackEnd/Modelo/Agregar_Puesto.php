<?php

include ("../Modelo/Conexion.php");

// $message = "";

// $NombrePuesto = $_POST['NombrePuesto'];



// $sql_agregar = 'INSERT INTO puestos (NombrePuesto) VALUES (?)';

// $sentencia_agregar = $pdo ->prepare($sql_agregar);

// if($sentencia_agregar-> execute(array($NombrePuesto))){

//     // header("Location:../vistas/Alta_Puestos.php");
//     echo "1";
// }else{
//     die();
// }

//------------------------------------------------------------------------------
$NombrePuesto = $_POST['NombrePuesto'];


//Para verificar si el usuario existe
$sql = 'SELECT * FROM puestos WHERE NombrePuesto = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($NombrePuesto));
$resultado = $sentencia->fetch();


if ($resultado) {    
    echo "1";
}else{

    $sql = 'INSERT INTO puestos (NombrePuesto) VALUES (:NombrePuesto)';

    $statement = $pdo->prepare($sql);
    if ($statement->execute([':NombrePuesto'=>$NombrePuesto])) {       
        echo "2";
    }
}
?>
