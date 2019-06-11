<?php 
    require "../../Modelo/Conexion.php";


    $id=$_POST['IdEstado'];

    $sql= $pdo->prepare("SELECT * FROM poblacion WHERE IdEstado = '$id'");
    $sql->execute();
    $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);

    $html= "<option value='0' selected disabled> Seleccionar</option>";

    foreach ($resultado as $fila) {
        $html.= "<option value='".$fila['IdPoblacion']."'>".$fila['NombrePoblacion']."</option>";
    }
    echo $html;


?>