
<?php

include("../../Modelo/Conexion.php");

$sql = $pdo->prepare('SELECT s.IdSucursal, s.NombreSucursal, s.Region, em.NombreEmpresa, s.IdPoblacion, p.NombrePoblacion, e.NombreEstado
from Sucursal s, empresa em, Poblacion p, estado e
where s.IdEmpresa=em.IdEmpresa and s.IdPoblacion = p.IdPoblacion and p.IdEstado = e.IdEstado ') ;
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);


?>

<!--apartir de aqui los puse para ver lo de excel-->
<script src="../Recursos/js/jquery-3.2.1.min.js"></script>
<!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
        <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">
    


 <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nombre de la sucursal</th>
                                            <th>Empresa</th>
                                            <th>Región</th>
                                            <th>Población</th>
                                            <th>Estado</th>
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($result as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdSucursal']; ?></td>
                                                <td><?php echo $dato['NombreSucursal']; ?></td>
                                                <td><?php echo $dato['NombreEmpresa']; ?></td>
                                                <td><?php echo $dato['Region']; ?></td>
                                                <td><?php echo $dato['NombrePoblacion']; ?></td>
                                                <td><?php echo $dato['NombreEstado']; ?></td>
                                                
                                                <td>
                                                <a href="VEditar_Sucursal.php?IdSucursal=<?php echo $dato['IdSucursal']; ?>"><button  title="Editar" class="pd-setting-ed "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                <!-- <button  title="Editar" class="pd-setting-ed update" name="update" id="?php echo $dato['IdSucursal']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdSucursal']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>



<!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
    <script src="../Recursos/js/data-table/tableExport.js"></script>
    <script src="../Recursos/js/data-table/bootstrap-table-export.js"></script>