<?php 
    require "../../Modelo/Conexion.php";


    $id=$_POST['IdEmpresa'];

    $sql= $pdo->prepare("SELECT * FROM sucursal WHERE IdEmpresa = '$id'");
    $sql->execute();
    $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);

    $html= "<option value='' selected disabled> Seleccionar</option>";

    foreach ($resultado as $fila) {
        $html.= "<option value='".$fila['IdSucursal']."'>".$fila['NombreSucursal']."</option>";
    }
    echo $html;


?>