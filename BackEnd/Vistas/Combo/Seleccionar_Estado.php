<?php 
    require "../../Modelo/Conexion.php";


    $id=$_POST['IdPais'];

    $sql= $pdo->prepare("SELECT * FROM estado WHERE IdPais = '$id'");
    $sql->execute();
    $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);

    $html= "<option value='0' selected disabled> Seleccionar</option>";

    foreach ($resultado as $fila) {
        $html.= "<option value='".$fila['IdEstado']."'>".$fila['NombreEstado']."</option>";
    }
    echo $html;


?>