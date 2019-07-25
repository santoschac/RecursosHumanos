<?php
include "../../Modelo/Conexion.php";
session_start();

$_SESSION['IdSucursal'] = $_POST['IdSucursal'];

if($_SESSION['IdSucursal']){
    $IdSucursal = $_SESSION['IdSucursal'];
    $sql1= $pdo->prepare("SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, p.Departamento, pu.NombrePuesto, s.IdSucursal, s.NombreSucursal, e.NombreEmpresa
    from personal p
    inner join puestos pu on p.IdPuesto= pu.IdPuesto
    inner join sucursal s on p.IdSucursal = s.IdSucursal
    inner join empresa e on s.IdEmpresa = e.IdEmpresa where s.IdSucursal = $IdSucursal");
$sql1->execute();
$resultado=$sql1->fetchALL(PDO::FETCH_ASSOC);
}else{

}

?>

<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-key-events="true" data-cookie="true"
                                        data-cookie-id-table="saveId"  data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            
                                            <th>Empresa</th>
                                            <th>Sucursal</th>
                                            <th>Puesto</th>
                                            <th>Departamento</th>
                                            <th>Seleccionar</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdPersonal']; ?></td>
                                                <td><?php echo $dato['Nombre']; ?></td>
                                                <td><?php echo $dato['ApellidoPaterno'] ." ". $dato['ApellidoMaterno']; ?></td>
                                                
                                                <td><?php echo $dato['NombreEmpresa']; ?></td>
                                                <td><?php echo $dato['NombreSucursal']; ?></td>
                                                <td><?php echo $dato['NombrePuesto']; ?></td>
                                                <td><?php echo $dato['Departamento']; ?></td>
                                                
                                                <td>
                                                <a href="VAlta_Incapacidad.php?IdPersonal=<?php echo $dato['IdPersonal']; ?>"><button data-toggle="tooltip" class="pd-setting-ed"><span class="glyphicon">&#xe013;</span></button><a>
                                                    
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> 

 <!-- data table JS
            ============================================ -->
            <script src="../Recursos/js/data-table/bootstrap-table.js"></script>